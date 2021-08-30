<?php
    include '../dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['createItem'])) {
        $name = $_POST["name"];
        $price = $_POST["price"];
        $desc = $_POST["desc"]; 
        $categoryId = $_POST["categorie_id"]; 
        $sql = "INSERT INTO `pizza` (`name`, `price`, `desc`, `categorie_id`, `createdate`) VALUES ('$name', '$price', '$desc', '$categoryId', current_timestamp())";   
        $result = mysqli_query($conn, $sql);
        $pizzaId= $conn->insert_id;
        if ($result){
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                $newName = 'pizza-'.$pizzaId.
                $newfileName=$newName .".jpg";
                $uploadDir = $_SERVER['DOCUMENT_ROOT'].'/assets/img/';
                $uploadFile = $uploadDir . $newfileName;               
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
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
        }else {
            echo "<script>alert('failed');
                    window.location=document.referrer;
                </script>";
        }
    }
    if(isset($_POST['removeItem'])) {
        $pizzaId= $_POST["pizzaId"];
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
        }
        else {
            echo "<script>alert('failed');
            window.location=document.referrer;
            </script>";
        }
    }
    if(isset($_POST['updateItem'])) {
        $pizzaId= $_POST["pizzaid"];
        $name = $_POST["name"];
        $desc = $_POST["desc"];
        $price = $_POST["price"];
        $categoryId = $_POST["categorie_id"];
        $sql = "UPDATE `pizza` SET `name`='$name', `price`='$price', `desc`='$desc', `categorie_id`='$categoryId' WHERE `pizzaid`='$pizzaId'";   
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
    if(isset($_POST['updateItemPhoto'])) {
        $pizzaId= $_POST["pizzaid"];
        $check = getimagesize($_FILES["itemimage"]["tmp_name"]);
        if($check !== false) {
            $newName = 'pizza-'.$pizzaId.
            $newfileName=$newName .".jpg";

            $uploadDir = $_SERVER['DOCUMENT_ROOT'].'/assets/img/';
            $uploadFile = $uploadDir . $newfileName;

            if (move_uploaded_file($_FILES['itemimage']['tmp_name'], $uploadFile)) {
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