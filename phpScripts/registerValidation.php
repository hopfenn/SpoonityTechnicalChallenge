 <?php 
 if($user->validateRequired($firstName, $lastName, $email, $pwd, $confirmPwd)){ 
    //if true, then there is an error
    $error = $error."Please enter the missing fields.<br />";
    $validationPassed = false;
    if (empty($firstName)) {
        $fnReq = "errorField";            
    } 
    if (empty($lastName)) {
        $lnReq = "errorField";
	}
	if (empty($email)) {
        $eReq = "errorField";
    }
    else{
        if ($user->validateEmail($email)){
            $validationPassed = false;
            $error = $error."The e-mail address you entered is invalid.<br />";
            $eReq = "errorField";
        }//validate email
    }
    if (empty($pwd)) {
        $pwdReq = "errorField";
    }
    if (empty($confirmPwd)) {
        $cPwdReq = "errorField";
    }
}//vadliate required fields
   
if (!$user->validatePwdMatch($pwd, $confirmPwd)){
    $validationPassed = false;
    $error = $error."Passwords do not match.<br />";
    $pwdReq = "errorField";
    $cPwdReq = "errorField";
}//validate passwords match
if (!$user->validateDuplicateEmail($email)){
	$validationPassed = false;
    $error = $error."This e-mail is already in use.<br />";
    $eReq = "errorField";
}
if (!$user->validatePassword($pwd)){
    $validationPassed = false;
    $error = $error."Your password must:<ul> 
    <li>Be minimum 4 characters long.</li>
    <li>Contain at least one uppercase letter.</li>
    <li>At least one number.</li></ul>";
    $pwdReq = "errorField";
    $cPwdReq = "errorField";
}
if ($validationPassed == true) { 
    $user->registerUser($firstName, $lastName, $email, $pwd);
    if ($user->userLogin($email, $pwd)){
        header("Location: index.php");
        $loginError = "";   
    }
}//validation passed
else { ?>
    <script type="text/javascript">
        //If validation fails, keep form filled with the data that was entered (instead of clearing it)
        $(document).ready( function() {
            var firstName = <?php echo json_encode($firstName);?>;
            var lastName = <?php echo json_encode($lastName);?>;
            var email = <?php echo json_encode($email);?>;
            $('#txtFirstName').val(firstName);
	        $('#txtLastName').val(lastName);
            $('#txtEmail').val(email);
        });
    </script>
<?php } ?>