<?php
include '../../models/admin/menuModel.php';
 
session_start();

class Login{ 
    public $login; 

    public function __construct(){
        $this->login = new User();
    } 
    public function removingItem(){
        $result = $this->login->removeItem();
        if ($result){
            echo "<script>alert('success');
            window.location=document.referrer;
        </script>";
        }      
        
}
}
$user = new Login();
$user -> removingItem();
