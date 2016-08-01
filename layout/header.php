<?php include './dataLayer/dbAccess.class.php';?>
<?php //include '../../dbAccess.class.php';?>
<?php include './dataLayer/user.class.php';?>

<?php 
    $db = new Database;
    $user = new User($db);
    
    if ($user->isUserLoggedIn()){
        $welcomeText = "Welcome, ".$_SESSION['userLoggedIn'];
        $loginText = "Logout";
        $loginout = "phpScripts/logout.php";
        $register = "";
    }
    else {
        $welcomeText = "";
        $loginText = "Login";
        $loginout = "login.php";
        $register = "Register";
    }

 ?>
 
<!DOCTYPE html>
    <head>
        <title class="title">Spoonity Technical Challenge </title>
        <link rel="stylesheet" type="text/css" href="styles/main.css">  
        <script src="js/main.js"></script>
        <script src="js/jquery-3.1.0.min.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script src="js/angular.min.js"></script>
        <script src="js/search.js"></script>
    </head>
    <body >
        <nav>
            <h1 class="logo"><a  href="index.php">Spoonity Technical Challenge</a></h1>
            <div id="navigation">
                <ul class="navbar">
                    <li><?=$welcomeText;?></li>
                    <li><a  href="index.php">Home</a></li>
                    <li><a href="<?=$loginout;?>"><?=$loginText?></a></li>
                    <li><a href="register.php"><?=$register?></a></li>
                </ul>
            </div>
        </nav>

 
            
  