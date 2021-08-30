<?php 
    error_reporting(0);    
    $statusModalSql = "SELECT * FROM `orders` WHERE `user_id`= $userId";
    $statusModalResult = mysqli_query($conn, $statusModalSql);
    while($statusModalRow = mysqli_fetch_assoc($statusModalResult)){
        $orderId = $statusModalRow['order_id'];
        $status = $statusModalRow['status'];        
        if ($status == 0){ 
            $tstatus = "Orderrd Successfully.";
        }elseif ($status == 1){ 
            $tstatus = "Order Confirmed.";
        }elseif ($status == 2){
            $tstatus = "Preparing Your Order!";
        }elseif ($status == 3){
            $tstatus = "On the way.";
        }elseif ($status == 4){
            $tstatus = "Order Placed";
        }elseif ($status == 5){ 
            $tstatus = "Order Denied.";
        }else{
            $tstatus = "Order Cancelled.";
        }
        if($status >=0 && $status <=4) {
            $deliveryDetailSql = "SELECT * FROM `deliverydetails` WHERE `order_id`= $orderId"; 
                    
            $deliveryDetailResult = mysqli_query($conn, $deliveryDetailSql);
            $deliveryDetailRow = mysqli_fetch_assoc($deliveryDetailResult);
            $trackId = $deliveryDetailRow['id'];            
            $deliveryBoyName = $deliveryDetailRow['deliverypersonname'];
            $deliveryBoyPhoneNo = $deliveryDetailRow['deliverypersonphoneno'];
            $deliveryTime = $deliveryDetailRow['deliverytime'];
            if($status == 6){
                $deliveryTime = 'xx';
            }else {
                $trackId = 'xxxxx';
                $deliveryBoyName = '';
                $deliveryBoyPhoneNo = '';
                $deliveryTime = 'xx';
            }
        }
      include "../views/orderStatus.php";
    }
?>
 
        
    
        
