<?php

namespace Login;
use Database;

class Model extends Database
{
    protected function selectPassword($email){
        $stmt = $this->connect()->prepare("SELECT password FROM users WHERE email = ?");

        if(!$stmt->execute(array($email))){
            $stmt = null;
            header("location: /page/login.php?error=stmt-failed");
            exit();
        }

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    protected function selectUser($email, $hashedPassword)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE email = ? AND password = ?");

        if (!$stmt->execute(array($email, $hashedPassword))) {
            $stmt = null;
            header("location: /page/login.php?error=stmt-failed");
            exit();
        }

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}