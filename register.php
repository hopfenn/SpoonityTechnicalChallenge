<?php session_start();?>
<!-- Header is in a separate php file (header.php), to prevent duplicating it on each page  -->
<?php include 'layout/header.php'; ?>
<script type="text/javascript">
$(document).ready(function(){
   validateRegistration();
});
</script>
<?php 
    $isError = false;
    $error = "";
    $fnReq = "";
    $lnReq = "";
    $eReq = "";
    $pwdReq = "";
    $cPwdReq = "";
    
 if(isset($_POST['btnRegister'])){
     //insert validation here
    $error = "";
    $validationPassed = true;

    $firstName = trim($_POST['txtFirstName']);
    $lastName = trim($_POST['txtLastName']);
    $email = trim($_POST['txtEmail']);
    $pwd = trim($_POST['txtPassword']);
    $confirmPwd = trim($_POST['txtConfirmPassword']);
    
    include 'phpScripts/registerValidation.php';
 }
   
?>
<section id="loginWrapper">
    <form method="post" id="frmRegister">
        <h3 class="register">Register</h3>
        <div class="errorContainer">
            <p class="errorText"><?=$error;?></p>
        </div>
        <div class="registerContainer">
            <label>First Name </label><input class="regsiterInput <?=$fnReq;?>" name="txtFirstName" id="txtFirstName" type="text"/>
        </div>
        <div class="registerContainer">
            <label>Last Name </label><input class="regsiterInput <?=$lnReq;?>" name="txtLastName" id="txtLastName" type="text"/>
        </div>
        <div class="registerContainer">
            <label>Email </label><input class="regsiterInput <?=$eReq;?>" name="txtEmail" id="txtEmail" type="text"/>
        </div>
        <div class="registerContainer">
            <label>Password </label><input class="regsiterInput <?=$pwdReq;?>" name="txtPassword" id="txtPassword" type="password"/>
        </div>
        <div class="registerContainer">
            <label>Confirm Password </label><input class="regsiterInput <?=$cPwdReq;?>" name="txtConfirmPassword" id="txtConfirmPassword" type="password"/>
        </div>
        <div class="registerContainer">
            <input class="loginBtn" name="btnRegister" id="btnRegister" type="Submit" value="Sign up!"/>
        </div>
    </form>
    
</section>

<!-- Footer is in a separate php file (header.php), to prevent duplicating it on each page -->        
<?php include 'layout/footer.php'; ?>  
