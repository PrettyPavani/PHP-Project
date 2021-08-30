<?php
//   error_reporting(0);
   
    include '../dbconnect.php';
    
if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['createCategory'])) {
        $categoryName = $_POST["name"];
        $categoryDesc = $_POST["desc"];

        $sql = "INSERT INTO `categories` (`name`, `desc`, `createdate`) VALUES ('$categoryName', '$categoryDesc', current_timestamp())";   
        $result = mysqli_query($conn, $sql);
        $categoryId = $conn->insert_id;
        
        if($result) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                
                $newFileName = "card-".$categoryId.".jpg";
                $uploadDir = $_SERVER['DOCUMENT_ROOT'].'/assets/img/';
                $uploadFile = $uploadDir . $newFileName;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                    echo "<script>alert('success');
                            window.location=document.referrer;
                        </script>";
                } else {
                    echo "<script>alert('failed to upload image');
                            window.location=document.referrer;
                        </script>";
                }

            }
            else{
                echo '<script>alert("Please select an image file to upload.");
                    </script>';
            }
        }
    }
    if(isset($_POST['removeCategory'])) {
        $categoryId = $_POST["catId"];
        $filename = $_SERVER['DOCUMENT_ROOT']."/assets/img/card-".$categoryId.".jpg";
        $sql = "DELETE FROM `categories` WHERE `id`='$categoryId'";   
        $result = mysqli_query($conn, $sql);
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
    if(isset($_POST['updateCategory'])) {
        $categoryId = $_POST["catId"];
        $categoryName = $_POST["name"];
        $categoryDesc = $_POST["desc"];
        $sql = "UPDATE `categories` SET `name`='$categoryName', `desc`='$categoryDesc' WHERE `catId`='$categoryId'";   

        
        $result = mysqli_query($conn, $sql);
        if ($result){
            echo "<script>alert('update');
                window.location=document.referrer;
                </script>";
        }
        else {
            echo "<script>alert('failed');
                window.location=document.referrer;
                </script>";
        }
    }
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
        }
        else{
            echo '<script>alert("Please select an image file to upload.");
            window.location=document.referrer;
                </script>';
        }
    }
}
?>