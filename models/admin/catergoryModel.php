<?php
include '../../models/users/config.php';
 
class Admin extends Dbconnection{   

    public function __construct(){
        parent::__construct();
    }

    public function removeCategory(){
        if(isset($_POST['removeCategory'])) {
            $categoryId = $_POST["catId"];
            $filename = $_SERVER['DOCUMENT_ROOT']."/assets/img/card-".$categoryId.".jpg";
            $sql = "DELETE FROM `categories` WHERE `id`='$categoryId'";   
            $result = $this->connection->query($sql);
            if ($result){
                if (file_exists($filename)) {
                    unlink($filename);
                }
                echo "<script>alert('Removed');
                    window.location=document.referrer;
                    </script>";
            }
            else {
                echo "<script>alert('failed');
                    window.location=document.referrer;
                    </script>";
            }
        }
    } 
    
    public function updateCatPhoto()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST") {        
        if(isset($_POST['updateCatPhoto'])) {            
            $categoryId = $_POST["catId"];
            $check = getimagesize($_FILES["catimage"]["tmp_name"]);
            if($check !== false) {
                $newName = 'card-'.$categoryId;
                $newFileName=$newName .".jpg";    
                $uploadDir = $_SERVER['DOCUMENT_ROOT'].'/assets/img/';
                $uploadFile = $uploadDir . $newFileName;    
                if (move_uploaded_file($_FILES['catimage']['tmp_name'], $uploadFile)) {
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
    }
}
}

$admin = new Admin();