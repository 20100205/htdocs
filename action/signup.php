<?php

if(isset($_POST["Signup"])){
    include $_SERVER['DOCUMENT_ROOT'] . "/class/Database.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/class/Signup/Model.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/class/Signup/Control.php";

    $username = $_POST["Username"];
    $email = $_POST["Email"];
    $password = $_POST["Password"];
    $repeatPassword = $_POST["RepeatPassword"];

    $signup = new \Signup\Control($username, $email, $password, $repeatPassword);
    $signup -> signupUser();
    header("location: /page/login.php");
} else {
    header("location: /page/signup.php");
}



