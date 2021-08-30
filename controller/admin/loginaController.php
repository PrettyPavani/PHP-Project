<?php
include '../../models/admin/loginaModel.php';

session_start();

class Login{
    public $login;

    public function __construct(){
        $this->login = new User();
    } 
    
    public function loginUser(){
        $result = $this->login->login();
        if ($result){
            $showAlert = true;
          header("Location: /views/index.php?loginsuccess=true");
        }else{
            
            header("Location: /index.php");
        }
       
    }
}
$user = new Login();
$user -> loginUser();