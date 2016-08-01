<?php 
    $loginError = "";
    $loginErrorSession = "";
    $eReq = "";
    $pwdReq = "";
    $error = "";
    if (isset($_SESSION['loginError'])){
        $loginErrorSession = $_SESSION['loginError'];
        unset($_SESSION['loginError']);
    }
    

    if (isset($_POST['btnLogin'])){
        $email = trim($_POST['txtEmail']);
        $pwd = trim($_POST['txtPassword']);
        $error = ""; 
        $validationPassed = true;
        
        include 'phpScripts/loginValidation.php';
    }
?> 
<section id="loginWrapper">
    <form method="post" id="frmLogin">
        <h3 class="login">Login</h3>
        <div class="errorContainer">
            <p class="errorText"><?=$loginError;?><?=$error;?></p>
        </div>
        <div class="loginContainer">
            <label>Email </label><input class="loginInput <?=$eReq?>" name="txtEmail" id="txtEmail" type="text"/>
        </div>
        <div class="loginContainer">
            <label>Password </label><input class="loginInput <?=$pwdReq?>" name="txtPassword" id="txtPassword" type="password"/>
        </div>
        
        <div class="loginContainer">
            <input class="loginBtn" name="btnLogin" type="Submit" value="Login"/>
        </div>
        <div class="loginContainer">
            <p class="pleaseRegister">Don't have an account? <a href="register.php">Register!</a></p>
        </div>
    </form>
</section>