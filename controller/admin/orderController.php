<?php
session_start();
include "../../models/admin/orderModel.php";

class Signup{
    public $signup; 
    public function __construct(){
        $this->signup = new User();
    }
 
    public function updatingStatus(){
        $result = $this->signup->updateStatus();
        if($result){
            echo "<script>alert('update successfully');
            window.location=document.referrer;
            </script>";
        }
    }
    public function updatingDeliveryDetails(){        
        $result = $this->signup->updateDeliveryDetails();
        if($result){
            echo "<script>alert('update successfully');
            window.location=document.referrer;
            </script>";
        }
    }

    
}
$user = new signup();
$user -> updatingStatus();

