<?php
include '../../models/users/config.php';
class User extends DBConnection {

    public function __construct()
    {        
        parent::__construct();
    }

    public function logIn(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            include 'dbconnect.php';
            $userName = $_POST["username"];
            $password = $_POST["password"];           
            
            $sql = "Select * from users where username='$userName' ";
            try{               
                $result = $this->connection->query($sql);  
                if(!$result){
                    throw new Exception("Error in selecting values");
                }
            }catch(Exception $e){
               echo "Message: " .$e->getMessage();
            }
            $num = mysqli_num_rows($result); 
            if ($num == 1){
                $row=mysqli_fetch_assoc($result);
                $userType = $row['usertype'];
                if($userType == 1) {
                    $userId = $row['id'];
                    if (password_verify($password, $row['password'])){ 
                        session_start();
                        $_SESSION['adminloggedin'] = true;
                        $_SESSION['adminusername'] = $userName;
                        $_SESSION['adminuser_id'] = $userId;
                        header("Location: /views/index.php?loginsuccess=true");
                        exit();
                    } 
                    else{
                        header("Location: controller/admin/login.php?loginsuccess=false");
                    }
                }
                else {
                    header("Location: controller/admin/login.php?loginsuccess=false");
                }
            } 
            else{
                header("location: /admin/login.php?loginsuccess=false");
            }
        }    
}
}
$user = new User;