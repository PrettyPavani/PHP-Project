<?php
    include 'dbconnect.php';
    session_start();  
    if($_SERVER["REQUEST_METHOD"] == "POST") {  
        $userId = $_SESSION['user_id'];        
    
    if(isset($_POST['removeAllItem'])) {
        $sql = "DELETE FROM `cart` WHERE `user_id`='$userId'";   
        $result = mysqli_query($conn, $sql);
        echo "<script>window.history.back(1);</script>"; 
    }
    if(isset($_POST['checkout'])) {
        $amount = $_POST["amount"];
        $address1 = $_POST["address"];
        $address2 = $_POST["address1"];
        $phone = $_POST["phone"];
        $zipcode = $_POST["zipcode"];
        $address = $address1.", ".$address2;        
        $sql = "INSERT INTO `orders` (`user_id`, `address`, `zipcode`, `phoneno`, `amount`, `paymentMode`, `status`, `createdate`) VALUES ('$userId', '$address', '$zipcode', '$phone', '$amount', '0', '0', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $orderId = $conn->insert_id;
        if ($result){
            $addSql = "SELECT * FROM `cart` WHERE `user_id`='$userId'"; 
            $addResult = mysqli_query($conn, $addSql);
            while($addrow = mysqli_fetch_assoc($addResult)){
                $pizzaId = $addrow['pizzaid'];
                $quantity = $addrow['quantity'];
                $itemSql = "INSERT INTO `orderitems` (`order_id`, `pizzaid`, `quantity`) VALUES ('$orderId', '$pizzaId', '$quantity')";
                $itemResult = mysqli_query($conn, $itemSql);
                }
                $deleteSql = "DELETE FROM `cart` WHERE `user_id`='$userId'";   
                $deleteResult = mysqli_query($conn, $deleteSql);
                echo '<script>alert("Thanks for ordering with us. Your order id is ' .$orderId. '.");
                   window.location.href="/index.php";      
                    </script>';
                    exit();
                }           
            }
            if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
                $pizzaId = $_POST['pizzaid'];
                $qty = $_POST['quantity'];
                $updateSql = "UPDATE `cart` SET `quantity`='$qty' WHERE `pizzaid`='$pizzaId' AND `user_id`='$userId'";
                $updateResult = mysqli_query($conn, $updateSql);
            }
        }
?>