<?php

include 'config.php';

class User extends DBConnection{

    public function __construct()
    {
        parent::__construct();
    }

    public function registerUser()
    {
        if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['username']!="" && $_POST["firstname"]!="" && $_POST['lastname']!="" &&
         $_POST['email']!="" && $_POST['phone']!="" && $_POST['password']!=""&& $_POST['confirmpassword']!=""){
            $userName = $_POST["username"];
            $firstName = $_POST["firstname"];
            $lastName = $_POST["lastname"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];   
            $password = $_POST["password"];
            $confirmPassword = $_POST["confirmpassword"];
            $existSql = "SELECT * FROM `users` WHERE email = '$email'";
            $result = $this->connection->query($existSql);
            $numExistRows = mysqli_num_rows($result);            
            if($numExistRows > 0){
                $showError = "email Already Exists";
                header("Location: /index.php?signupsuccess=false&error=$showError");
            }else{
                if(($password == $confirmPassword)){
                    $sql = "INSERT INTO `users` ( `username`, `firstname`, `lastname`, `email`, `phone`,`password`, `createDate`) VALUES 
                    ('$userName', '$firstName', '$lastName', '$email', '$phone','$password',current_timestamp())";   
                    
                    try{           
                    $result = $this->connection->query($sql);
                    if(!$result){
                        return false;
                    }else{
                        return true;
                    }
                }catch(Exception $e){
                    echo "Message: " .$e->getMessage();
                }
                }
            }
        }
    }
           
}

$register = new User;