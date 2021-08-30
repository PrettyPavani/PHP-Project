<?php
// session_start();
include '../../models/admin/catergoryModel.php';
  
class Login{
    public $login;
    public function __construct(){
        $this->login = new Admin();
    }
    public function updatingCatPhoto(){
        $result = $this->login->updateCatPhoto();
        if($result){
            echo "<script>alert('success');
                            window.location=document.referrer;
                        </script>";
        }
        
    }   
     
        
}
$user = new Login();
$user -> updatingCatPhoto();

