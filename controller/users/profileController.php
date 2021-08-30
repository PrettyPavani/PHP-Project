<?php
session_start();
include '../../models/users/profileModel.php';

class Login{
    public $login;
    public function __construct(){
        $this->login = new User();
    }
    
    public function updatingProfileDetail(){
         $result = $this->login->updateProfileDetail(); 
         if($result){
            echo '<script>alert("Update successfully.");
            window.history.back(1);
        </script>';          
    }             
    }     

    
}

$register = new Login();

$register -> updatingProfileDetail();
