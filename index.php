<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("location: htdocs/page/login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/authentication.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Home</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
            </ul>
        </nav>
    </header>
    <div>Homepage!</div>
</body>
</html>
