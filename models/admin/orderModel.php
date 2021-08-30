
<?php
include '../../models/users/config.php';

class User extends DBConnection{
    
    public function __construct(){
       parent::__construct();
    } 

    public function updateStatus() {  
      
        if(isset($_POST['updateStatus'])) { 
            $orderId = $_POST['order_id']; 
            $status = $_POST['status'];
    
            $sql = "UPDATE `orders` SET `status`='$status' WHERE `order_id`='$orderId'";   
            $result = $this->connection->query($sql);
            if ($result){
                echo "<script>alert('update successfully');
                    window.location=document.referrer;
                    </script>";
            } else {
                echo "<script>alert('failed');
                    window.location=document.referrer;
                    </script>";
            }
        }
}

    public function updateDeliveryDetails()
    {
       
            $trackId = $_POST['trackId'];
            $orderId = $_POST['order_id'];
            $name = $_POST['name'];
            $time = $_POST['time'];
            $phone = $_POST['phone'];
            if($trackId == NULL) {
                $sql = "INSERT INTO `deliverydetails` (`order_id`, `deliverypersonname`, `deliverypersonphoneno`, `deliverytime`, `createdate`) VALUES ('$orderId', '$name', '$phone', '$time', current_timestamp())";   
                $result = mysqli_query($conn, $sql);
                $trackId = $conn->insert_id;
                if ($result){
                    echo "<script>alert('update successfully');
                        window.location=document.referrer;
                        </script>";
                }
                else {
                    echo "<script>alert('failed');
                        window.location=document.referrer;
                        </script>";
                }
            } else {
                $sql = "UPDATE `deliverydetails` SET `deliverypersonname`='$name', `deliverypersonphoneno`='$phone', `deliverytime`='$time',`createdate`=current_timestamp() WHERE `id`='$trackId'";   
                $result = mysqli_query($conn, $sql);
                if ($result){
                    echo "<script>alert('update successfully');
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
