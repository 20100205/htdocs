<?php

namespace Login;

class Control extends Model
{
    private $email;
    private $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function loginUser(){
        if($this->emptyInput()){
            header("location: /page/login.php?error=empty-input");
            exit();
        }

        if($this->wrongPassword()){
            header("location: /page/login.php?error=wrong-email-or-password");
            exit();
        }

        $hashedPassword = $this->selectPassword($this->email);
        $user = $this->selectUser($this->email, $hashedPassword["password"]);

        session_start();
        $_SESSION["user_id"] = $user["user_id"];
    }

    private function emptyInput(){
        $result = null;

        if(empty($this->email) || empty($this->password)) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }

    private function wrongPassword(){
        $result = null;
        $hashedPassword = $this->selectPassword($this->email);

        if(!password_verify($this->password, $hashedPassword["password"])) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }
}