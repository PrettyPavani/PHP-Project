<div class="container" style="margin-top:98px;background: aliceblue;">
    <div class="table-wrapper">
        <div class="table-title" style="border-radius: 14px;">
            <div class="row">
                <div class="col-sm-4">
                    <h2>Order <b>Details</b></h2>
                </div>
                <div class="col-sm-8">						
                    <a href="" class="btn btn-primary"><i class="material-icons">&#xE863;</i> <span>Refresh List</span></a>
                    <a href="#" onclick="window.print()" class="btn btn-info"><i class="material-icons">&#xE24D;</i> <span>Print</span></a>
                </div>
            </div>
        </div>        
        <table class="table table-striped table-hover text-center" id="NoOrder">
            <thead style="background-color: rgb(111 202 203);">
                <tr>
                    <th>Order Id</th>
                    <th>User Id</th>
                    <th>Address</th>
                    <th>Phone No</th>
                    <th>Amount</th>						
                    <th>Payment Mode</th>
                    <th>Order Date</th>
                    <th>Status</th>						
                    <th>Items</th>
                </tr>
            </thead>
            <tbody>
                <?php  
                    include_once "../models/script.php";
                    $result = new PizzaService();
                    $manageResult = $result->orderManageScript();       
                ?>
            </tbody>
        </table>
    </div>
</div> 
<?php 
    include 'orderItemModal.php';
    include 'orderStatusModal.php';
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href = "/assets/css/orderManageStyle.css">
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>