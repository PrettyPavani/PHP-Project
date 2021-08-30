<?php
// session_start();
include '../../models/admin/siteModel.php';
  
class Login{
    public $login;
    public function __construct(){
        $this->login = new User();
    }
    public function updatingSiteDetails(){
       $result = $this->login->updateDetail();
       if($result){
        echo "<script>alert('success');
        window.history.back(1);
            </script>";
    }   

    }
}
$user = new Login();
$user -> updatingSiteDetails();