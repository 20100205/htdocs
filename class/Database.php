<?php

class Database
{
    protected function connect(){
        try{
            $username = "root";
            $password = "";
            $dbh = new PDO("mysql:host=localhost;dbname=ghostling", $username, $password);
            $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
            return $dbh;
        } catch(PDOException $exception){
            print "Error: " . $exception->getMessage() . "<br>";
            die();
        }
    }

}