<?php

namespace Signup;
use Database;

class Model extends Database
{
    protected function insertUser($username, $email, $password){
        $stmt = $this->connect()->prepare("INSERT INTO users (username, email, password) VALUES (?,?,?)");
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($username, $email, $hashedPassword))){
            $stmt = null;
            header("location: /page/Signup.php?error=stmt-failed");
            exit();
        }
    }

    protected function checkUsername($username){
        $stmt = $this->connect()->prepare("SELECT username FROM users WHERE username = ?");

        if(!$stmt->execute(array($username))){
            $stmt = null;
            header("location: /page/Signup.php?error=stmt-failed");
            exit();
        }

        $result = null;

        if($stmt->rowCount() > 0){
            $result = true;
        }else{
            $result = false;
        }

        return $result;
    }

    protected function checkEmail($email){
        $stmt = $this->connect()->prepare("SELECT email FROM users WHERE email = ?");

        if(!$stmt->execute(array($email))){
            $stmt=null;
            header("location: /page/Signup.php?error=stmt-failed");
            exit();
        }

        $result = null;

        if($stmt->rowCount() > 0){
            $result = true;
        }else{
            $result = false;
        }

        return $result;
    }

}