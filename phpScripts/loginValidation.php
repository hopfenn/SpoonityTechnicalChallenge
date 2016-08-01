<?php
$error = "";


if ($user->validateLoginRequired($email, $pwd)){
    $validationPassed = false;
    $error = $error."Please enter the missing fields.<br />";
    if (empty($email)){
        $eReq = "errorField";
    }
    else{
        if ($user->validateEmail($email)){
        $validationPassed = false;
        $error = $error."The e-mail address you entered is invalid.<br />";
        $eReq = "errorField";
    }//validate email
    }
    if (empty($pwd)){
        $pwdReq = "errorField";
    }   
}//validateLoginRequired


        
if ($validationPassed == true) {
    if ($user->userLogin($email, $pwd)){
        header("Location: index.php");
        $loginError = "";   
    }
    else {  ?>
    <script type="text/javascript">
        //If validation fails, keep form filled with the data that was entered (instead of clearing it)
        $(document).ready( function() {
            var email = <?php echo json_encode($email);?>;
            $('#txtEmail').val(email);
        });
    </script>
    <?php
        $loginError = "Sorry, your email/password combination is invalid! Please try again.";
    }
}//validationPassed
else { ?>
    <script type="text/javascript">
        //If validation fails, keep form filled with the data that was entered (instead of clearing it)
        $(document).ready( function() {
            var email = <?php echo json_encode($email);?>;
            $('#txtEmail').val(email);
        });
    </script>
<?php } ?>