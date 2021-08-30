<?php
                        $sql = "SELECT * FROM `orders` WHERE `user_id`= $userId";
                        $result = mysqli_query($conn, $sql);
                        $counter = 0;
                        while($row = mysqli_fetch_assoc($result)){
                            $orderId = $row['order_id'];
                            $address = $row['address'];
                            $zipcode = $row['zipcode'];
                            $phoneno = $row['phoneno'];
                            $amount = $row['amount'];
                            $createdate = $row['createdate'];
                            $paymentmode = $row['paymentmode'];
                            if($paymentmode == 0) {
                                $paymentmode = "Cash on Delivery";
                            }
                            else {
                                $paymentmode = "Online";
                            }
                            $status = $row['status'];                            
                            $counter++;                            
                            echo '<tr>
                                    <td>' . $orderId . '</td>
                                    <td>' . substr($address, 0, 20) . '</td>
                                    <td>' . $phoneno . '</td>
                                    <td>' . $amount . '</td>
                                    <td>' . $paymentmode . '</td>
                                    <td>' . $createdate . '</td>
                                    <td><a href="#" data-toggle="modal" data-target="#status' . $orderId . '" class="view"><i class="material-icons">&#xE5C8;</i></a></td>
                                    <td><a href="#" data-toggle="modal" data-target="#orderItem' . $orderId . '" class="view" title="View Details"><i class="material-icons">&#xE5C8;</i></a></td>
                                    
                                </tr>';
                        }
                        
                        if($counter==0) {
                            ?>
                            <script> document.getElementById("empty").innerHTML = '<div class="col-md-12 my-5"><div class="card"><div class="card-body cart"><div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3"><h3><strong>You have not ordered any items.</strong></h3><h4>Please order to make me happy :)</h4> <a href="/index.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a> </div></div></div></div>';</script> 
                            <?php
                        }
                    ?>