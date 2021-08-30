<?php
session_start();
include '../../models/users/loginModel.php';
class Login{
    public $login;

    public function __construct(){
        $this->login = new User();
    } 
    
    public function loginUser(){
        $result = $this->login->logIn();         
        if($result){
            header("Location: /index.php?loginsuccess=true"); 
        }
        else{
            header("Location: /index.php?loginsuccess=false");
        }      
    }
}
$user = new Login();
$user -> loginUser();

