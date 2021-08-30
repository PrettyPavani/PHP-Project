<?php
session_start();

include '../../models/users/config.php';

class User extends DBConnection{   

    public function __construct()
    {
        parent::__construct();
    }

    public function updateDetail()
    {        
        if($_SERVER["REQUEST_METHOD"] == "POST") {          
                $name = $_POST["name"];
                $email = $_POST["email"];
                $contact1 = $_POST["contact1"];
                $contact2 = $_POST["contact2"];
                $addr = $_POST["address"];
                $sql = "UPDATE `sitedetail` SET systemName = '$name',email = '$email',contact1 = '$contact1',contact2 = '$contact2',`address` = '$addr' WHERE tempId = 1";   
                $result = $this->connection->query($sql);
                if ($result) {
                    echo "<script>
                            window.location=document.referrer;
                             </script>";
                } else {
                    echo ("Could not insert data : " . mysqli_error($result) . " " . mysqli_errno());
                } 
        }
    }
}
$register = new User;

