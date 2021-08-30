<?php
session_start();
include '../../models/users/cartModel.php';
 
class Login{
    public $login;  

    public function __construct() {
        $this->login = new User();
    }    
    public function checkingOut() {
        $result = $this->login->checkOut();
        if($result){
            echo '<script>alert("Thanks for ordering with us. Your order id is ' .$orderId. '.");
            window.location.href="/index.php";      
             </script>';        }
    } 

    

}    
$additem = new Login();
$additem -> checkingOut();
