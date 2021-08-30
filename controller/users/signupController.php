<?php
session_start();
include '../../models/users/signupModel.php';
class Login{
    public $login;
    public function __construct(){
        $this->login = new User();
    }

    public function addNewUser(){
        $result = $this->login->registerUser();
        if ($result){
            
            header("Location: /index.php?signupsuccess=true");
        }else{
            
            header("Location: /index.php?signupsuccess=false&error=$showError");
        }
    }
}

$register = new Login();
$register -> addNewUser();

