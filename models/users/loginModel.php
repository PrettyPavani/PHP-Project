<?php
include 'config.php';
class User extends DBConnection {
   
    public function __construct()
    {
        parent::__construct();        
    }

    public function logIn()
    {
        if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST["loginusername"]!="" && $_POST["loginpassword"]!="") {
            $userName = $_POST["loginusername"];
            $password = $_POST["loginpassword"];           
            $sql = "Select * from users where username='$userName' ";
            try{               
                $result = $this->connection->query($sql); 
                if(!$result){
                    throw new Exception("Error in selecting values");
                }
            }catch(Exception $e){
               echo "Message: " .$e->getMessage();
            }          
            $row=mysqli_fetch_assoc($result);           
            $userId = $row['id'];
            // print_r($userId);            
            if($row['username']==$userName && $row['password']==$password){
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['loginusername'] = $userName;
                $_SESSION['user_id'] = $userId;
                return true;
            }else{
                return false;
          }
      }
    }
 

}
$user = new User;