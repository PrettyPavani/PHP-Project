<?php
include 'config.php';

class User extends DBConnection{
    private $connToDB;

    public function __construct(){
        parent::__construct();
    }   

    public function updateProfileDetail(){
        $userId = $_SESSION['user_id'];
        if(isset($_POST["updateProfileDetail"])){
            $firstName = $_POST["firstname"];
            $lastName = $_POST["lastname"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $sql = "UPDATE `users` SET `firstname` = '$firstName', `lastname` = '$lastName', `email` = '$email', `phone` = '$phone' WHERE `id` ='$userId'";   
            $result = $this->connection->query($sql); 
            if($result){
                echo '<script>
                            window.history.back(1);
                        </script>';
            }else{
                echo '<script>alert("Update failed, please try again.");
                            window.history.back(1);
                        </script>';
                } 
           
            }
        }  
    }
    
   






$item = new User;   