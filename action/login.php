<?php

if(isset($_POST["Login"])){
    include $_SERVER['DOCUMENT_ROOT'] . "/class/Database.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/class/Login/Model.php";
    include $_SERVER['DOCUMENT_ROOT'] . "/class/Login/Control.php";

    $email = $_POST["Email"];
    $password = $_POST["Password"];

    $signup = new \Login\Control($email, $password);
    $signup -> loginUser();
    header("location: /index.php");
} else {
    header("location: /page/login.php");
}
