<?php
session_start();
include '../../models/users/cartModel.php';
 
class Login{
    public $login;  

    public function __construct() {
        $this->login = new User();
    }    
    public function removingItems() {
        $result = $this->login->removeItem();
        if($result){
            echo "<script> alert(success);
            window.location=document.referrer</script>";
        }
    } 

    

}    
$removeitem = new Login();
$removeitem -> removingItems();

