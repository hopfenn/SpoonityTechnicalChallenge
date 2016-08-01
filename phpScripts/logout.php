<?php session_start();
    include '../dataLayer/dbAccess.class.php';
    include '../dataLayer/user.class.php';
    $db = new Database;
    $user = new User($db);
    $user->userLogout();
    header("Location: ../index.php");
 ?>