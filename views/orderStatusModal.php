<?php 
 error_reporting(0);
    $itemModalSql = "SELECT * FROM `orders`";
    $itemModalResult = mysqli_query($conn, $itemModalSql);
    while($itemModalRow = mysqli_fetch_assoc($itemModalResult)){
        $orderId = $itemModalRow['order_id'];
        $userId = $itemModalRow['user_id'];
        $status = $itemModalRow['status'];
    
?>

<div class="modal fade" id="status<?php echo $orderId; ?>" tabindex="-1" role="dialog" aria-labelledby="status<?php echo $orderId; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgb(111 202 203);">
        <h5 class="modal-title" id="status<?php echo $orderId; ?>">Order Status and Delivery Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../controller/admin/orderController.php" method="post" style="border-bottom: 2px solid #dee2e6;">
            <div class="text-left my-2">    
                <b><label for="name">Order Status</label></b>
                <div class="row mx-2">
                <input class="form-control col-md-3" id="status" name="status" value="<?php echo $status; ?>" type="number" min="0" max="6" required>    
                <button type="button" class="btn btn-secondary ml-1" data-container="body" data-toggle="popover" title="User Types" data-placement="bottom" data-html="true" data-content=" 
                               
                0=Ordered Successfully.<br>
                1=Order Confirmed.<br>
                2=Your order is on the way!.<br>
                3=On the way.<br>
                4=Order Placed.<br>
                5=Order Denied.<br>
                6=Order Cancelled.">
                    <i class="fas fa-info"></i>
                </button>
                </div>
            </div>
            <input type="hidden" id="order_id" name="order_id" value="<?php echo $orderId; ?>">
            <button type="submit" class="btn btn-success mb-2" name="updateStatus">Update</button>
        </form>
        <?php 
           include_once "../models/admin/orderStatusScript.php";
          
            if($status>0 && $status<5) { 
        ?>
            <form action="../models/admin/order.php" method="post">
                <div class="text-left my-2">
                    <b><label for="name">Delivery Boy Name</label></b>
                    <input class="form-control" id="name" name="name" value="<?php echo $deliveryBoyName; ?>" type="text" required>
                </div>
                <div class="text-left my-2 row">
                    <div class="form-group col-md-6">
                        <b><label for="phone">Phone No</label></b>
                        <input class="form-control" id="phone" name="phone" value="<?php echo $deliveryBoyPhoneNo; ?>" type="tel" required pattern="[0-9]{10}">
                    </div>
                    <div class="form-group col-md-6">
                        <b><label for="categoryId">Estimate Time(minute)</label></b>
                        <input class="form-control" id="time" name="time" value="<?php echo $deliverytime; ?>" type="number" min="1" max="120" required>
                    </div>
                </div>
                <input type="hidden" id="trackId" name="trackId" value="<?php echo $trackId; ?>">
                <input type="hidden" id="order_id" name="order_id" value="<?php echo $orderId; ?>">
                <button type="submit" class="btn btn-success" name="updateDeliveryDetails">Update</button>
            </form>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<?php
    }
?>

<style>
    .popover {
        top: -77px !important;
    }
</style>

<script>
    $(function () {
        $('[data-toggle="popover"]').popover();
    });
</script>