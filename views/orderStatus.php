<?php 
    error_reporting(0);    
    $statusModalSql = "SELECT * FROM `orders` WHERE `user_id`= $userId";
    $statusModalResult = mysqli_query($conn, $statusModalSql);
    while($statusModalRow = mysqli_fetch_assoc($statusModalResult)){
        $orderId = $statusModalRow['order_id'];
        $status = $statusModalRow['status'];
        // print_r($status);
        // die();
        
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
        ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/orderStatusModalStyle.css">
</head>
<body>
    
</body>
</html> 
    
<div class="modal fade" id="status<?php echo $orderId; ?>" tabindex="-1" role="dialog" aria-labelledby="status<?php echo $orderId; ?>" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="status<?php echo $orderId; ?>">Order Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="printThis">
                <div class="container" style="padding-right: 0px;padding-left: 0px;">
                    <article class="card">
                        <div class="card-body">
                            <h6><strong>Order ID:</strong><?php echo $orderId; ?></h6>
                            <article class="card">
                                <div class="card-body row">
                                    <div class="col"> <strong>Estimated Delivery time:</strong> <br><?php echo $deliveryTime; ?> minute </div>
                                    <div class="col"> <strong>Shipping By:</strong> <br> <?php echo $deliveryBoyName; ?> | <i class="fa fa-phone"></i> <?php echo $deliveryBoyPhoneNo; ?> </div>
                                    <div class="col"> <strong>Status:</strong> <br> <?php echo $tstatus; ?> </div>
                                    <div class="col"> <strong>Tracking #:</strong> <br> <?php echo $trackId; ?> </div>
                                </div>
                            </article>
                            <div class="track">
                            <?php
                                if($status == 0){
                                      echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Succesfully</span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-times"></i> </span> <span class="text">Order Confirmed</span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-times"></i> </span> <span class="text"> Preaparing Your Order</span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                                            <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Order Placed</span> </div>';
                                }elseif($status == 1){
                                    echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Succesfully</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Confirmed</span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-times"></i> </span> <span class="text">Preaparing Your Order </span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">On the way  </span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Order Placed</span> </div>';
                                }elseif($status == 2){
                                    echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Succesfully</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Preaparing Your Order</span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">On the way</span> </div>
                                          <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Order Placed</span> </div>';
                                }elseif($status == 3){
                                        echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Succesfully</span> </div>
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Confirmed</span> </div>
                                        <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Preaparing Your Order </span> </div>
                                        <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                                        <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Order placed</span> </div>';
                                }elseif($status == 4){
                                    echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Ordered Succesfully</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Confirmed</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Preaparing Your Order</span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                                          <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Order Placed</span> </div>';
                                }elseif($status == 5){
                                    echo '<div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Denied</span> </div>
                                          <div class="step deactive"> <span class="icon"> <i class="fa fa-times"></i> </span> <span class="text">Order Cancelled.</span> </div>';
                                }else {
                                    echo '<div class="step deactive"> <span class="icon"> <i class="fa fa-times"></i> </span> <span class="text">Order Cancelled.</span> </div>';
                                }
                            ?>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    }
?>
 
        
    
        
