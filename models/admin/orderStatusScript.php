<?php
           $deliveryDetailSql = "SELECT * FROM `deliverydetails` WHERE `order_id`= $orderId";
           
            $deliveryDetailResult = mysqli_query($conn, $deliveryDetailSql);
            $deliveryDetailRow = mysqli_fetch_assoc($deliveryDetailResult);
            $trackId = $deliveryDetailRow['order_id'];
            $deliveryBoyName = $deliveryDetailRow['deliverypersonname'];
            $deliveryBoyPhoneNo = $deliveryDetailRow['deliverypersonphoneno'];
            $deliverytime = $deliveryDetailRow['deliverytime'];