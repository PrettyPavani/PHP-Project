<?php
// session_start();
include '../../models/admin/catergoryModel.php';
  
class Login{
    public $login;
    public function __construct(){
        $this->login = new Admin();
    }
    public function removingCategory(){
        $result = $this->login->removeCategory();
        if($result){
            echo "<script>alert('success');
                            window.location=document.referrer;
                        </script>";
        }
        
    }   
     
        
}
$user = new Login();
$user -> removingCategory();


