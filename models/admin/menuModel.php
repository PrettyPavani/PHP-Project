<?php
include '../../models/users/config.php';
 
class User extends DBConnection {    

    public function __construct() 
    {
        parent::__construct();
    }

    public function updateItem()
    {        
            $pizzaId = $_POST["pizzaid"];
            $name = $_POST["name"];
            $desc = $_POST["desc"];
            $price = $_POST["price"];
            $categoryId = $_POST["categorie_id"];    
            $sql = "UPDATE `pizza` SET `name`='$name', `price`='$price', `desc`='$desc', `categorie_id`='$categoryId' WHERE `pizzaid`='$pizzaId'";   
            // print_r($sql);
            // die();
            $result = $this->connection->query($sql);
            if ($result){
                echo "<script>alert('update');
                    window.location=document.referrer;
                    </script>";
            } else {
                echo "<script>alert('failed');
                    window.location=document.referrer;
                    </script>";
            }
        }

    public function updateItemPhoto()
    {   
        $pizzaId = $_POST["pizzaid"];
        $check = getimagesize($_FILES["itemimage"]["tmp_name"]);
        if($check !== false) {
            $newName = 'pizza-'.$pizzaId;
            $newFileName=$newName .".jpg";

            $uploadDir = $_SERVER['DOCUMENT_ROOT'].'/assets/img/';
            $uploadFile = $uploadDir . $newFileName;

            if (move_uploaded_file($_FILES['itemimage']['tmp_name'], $uploadFile)) {
                echo "<script>alert('success');
                        window.location=document.referrer;
                    </script>";
            } else {
                echo "<script>alert('failed');
                        window.location=document.referrer;
                    </script>";
            }
        } else{
            echo '<script>alert("Please select an image file to upload.");
            window.location=document.referrer;
                </script>';
        }
    }

    public function removeItem()
    {
        if(isset($_POST['removeItem'])) {
            $pizzaId = $_POST["pizzaid"];
            $sql = "DELETE FROM `pizza` WHERE `pizzaid`='$pizzaId'";
            
            $result = mysqli_query($conn, $sql);
            $filename = $_SERVER['DOCUMENT_ROOT']."/assets/img/pizza-".$pizzaId.".jpg";
            if ($result){
                if (file_exists($filename)) {
                    unlink($filename);
                }
                echo "<script>alert('Removed');
                    window.location=document.referrer;
                </script>";
            } else {
                echo "<script>alert('failed');
                window.location=document.referrer;
                </script>";
            }
    }
    }

}
$user = new User;