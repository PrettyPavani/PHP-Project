<?php
session_start();
include '../../models/users/cartModel.php';
 
class Login{
    public $login;  

    public function __construct() {
        $this->login = new User();
    }    
    public function addingToCart() {
        $result = $this->login->addToCart();
        // if($result){
        //     echo "<script>window.history.back(1);</script>";
        // }
    } 
  
    

}    
$additem = new Login();
$additem -> addingToCart();
