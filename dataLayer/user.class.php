<?php 
class User{
    
    private $error;
    private $pdo;
    private $stmt;
     
     
    function __construct(Database $dbCon){
       $this->pdo = $dbCon->pdo;
    }
    
    //This function searchers for user info based on the search term entered.
    public function searchUsers($term){
        try{
            $sql = "SELECT * FROM user WHERE firstName LIKE CONCAT('%',:searchTerm,'%') OR lastName LIKE CONCAT('%',:searchTerm,'%') OR email LIKE CONCAT('%',:searchTerm,'%') ORDER BY lastName";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':searchTerm', $term, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        catch(PDOException $e){
            $this->error = $e->getMessage();
        }
    }//selectAllUsers()
    
    //This function registers a new user.
    function registerUser($firstName, $lastName, $email, $pwd){
        try{
            $newPwd = password_hash($pwd, PASSWORD_DEFAULT);
            $sql = "INSERT INTO user(firstName, lastName, email, password) VALUES (:fname, :lname, :email, :pwd)";
            $stmt  = $this->pdo->prepare($sql);
            $stmt->bindParam(':fname', $firstName);
            $stmt->bindParam(':lname', $lastName);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':pwd', $newPwd);
            $stmt->execute();
            return $stmt;
        }//try
        catch(PDOException $e) {
            $this->error = $e->getMessage();
        }//catch
    }//registerUser()

    function validateDuplicateEmail($email){
        try {
            $sql = "SELECT COUNT(*) FROM user WHERE email=:email";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $userCount = $stmt->fetchColumn();
        }
        catch(PDOException $e) {
            $this->error = $e->getMessage();
        }//catch
        if ($userCount > 0){
            return false;
        }
        else{
            return true;
        }
    }//validateDuplicateEmail()

    function validatePassword($pwd){
        $pwdPattern = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,16}$/';
        return preg_match($pwdPattern, $pwd);
    }//validatePassword
    
    function userLogin($email, $pwd){
        try {
            $sql = "SELECT * FROM user WHERE email=:email";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $result = $stmt->fetch();
            if ($stmt->rowCount() > 0){
                if(password_verify($pwd, $result['password'])){
                   $_SESSION['userLoggedIn'] = $result['firstName'];
                   return true;
                }
                else{
                    return false;
                }
            }
        }//try
        catch(PDOException $e) {
            //$this->error = $e->getMessage();
            echo $e->getMesssage();
        
        }//catch
        
    }//userLogin()
    
    function userLogout(){
        session_destroy();
        unset($_SESSION['userLoggedIn']);
        return true;
    }//userLogout()
    
    function isUserLoggedIn(){
        if (isset($_SESSION['userLoggedIn'])){
            return true;
        }//isUserLoggedIn()
    }//isUserLoggedIn()
    
    function validateRequired($firstName, $lastName, $email, $pwd, $confirmPwd){
        $isError = false;

        if (empty($firstName)){
            $isError = true;
        }
        if (empty($lastName)) {
            $isError = true;
        }
        if(empty($email)){
            $isError = true;
        }
        if(empty($pwd)){
            $isError = true;
        }
        if(empty($confirmPwd)){
            $isError = true;
        }
        return $isError;
    }//validateRegistration()

    function validateLoginRequired($email, $pwd){
        $isError = false;
        if (empty($email)){
            $isError = true;
        }
        if (empty($pwd)){
            $isError = true;
        }
        return $isError;
    }
    
    function validatePwdMatch($pwd, $confirmPwd){
        $isMatch = true;
        if ($pwd !== $confirmPwd){
            return false;       
        }
        return $isMatch;
    }
    
    function validateEmail($email){
        $isError = false;
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $isError = true;
        }
        return $isError;
    }
    
  

}//class User

?>