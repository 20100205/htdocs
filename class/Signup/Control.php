<?php

namespace Signup;

class Control extends Model
{
    private $username;
    private $email;
    private $password;
    private $repeatPassword;

    public function __construct($username, $email, $password, $repeatPassword)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->repeatPassword = $repeatPassword;
    }

    public function signupUser()
    {
        if($this->emptyInput()) {
            header("location: /page/Signup.php?error=empty-input");
            exit();
        }

        if($this->invalidUsername()) {
            header("location: /page/Signup.php?error=invalid-username");
            exit();
        }

        if($this->usernameTaken()) {
            header("location: /page/Signup.php?error=username-taken");
            exit();
        }

        if($this->invalidEmail()) {
            header("location: /page/Signup.php?error=invalid-email");
            exit();
        }

        if($this->emailTaken()) {
            header("location: /page/Signup.php?error=email-taken");
            exit();
        }

        if($this->invalidPassword()) {
            header("location: /page/Signup.php?error=invalid-password");
            exit();
        }

        if($this->passwordDoesNotMatch()) {
            header("location: /page/Signup.php?error=password-does-not-match");
            exit();
        }

        $this->insertUser($this->username, $this->email, $this->password);
    }

    private function emptyInput()
    {
        $result = null;

        if(empty($this->username) || empty($this->email) || empty($this->password) || empty($this->repeatPassword)) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }

    private function invalidUsername()
    {
        $result = null;

        if(!preg_match("/^[a-zA-Z0-9 ]{8,16}$/", $this->username)) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }

    private function usernameTaken()
    {
        $result = null;

        if($this->checkUsername($this->username)) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }

    private function invalidEmail()
    {
        $result = null;

        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }

    private function emailTaken()
    {
        $result = null;

        if($this->checkEmail($this->email)) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }

    private function invalidPassword()
    {
        $result = null;

        if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $this->password)) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }

    private function passwordDoesNotMatch()
    {
        $result = null;

        if($this->password !== $this->repeatPassword) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }
}