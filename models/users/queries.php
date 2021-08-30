<?php
    $mysql = "SELECT * FROM `orderitems` WHERE order_id = $orderId";
    $myresult = mysqli_query($conn, $mysql);

    while($myrow = mysqli_fetch_assoc($myresult)){
        $pizzaId = $myrow['pizzaid'];
        $quantity = $myrow['quantity'];                                        
        $itemSql = "SELECT * FROM `pizza` WHERE pizzaid = $pizzaId";
        $itemResult = mysqli_query($conn, $itemSql);
        $itemRow = mysqli_fetch_assoc($itemResult);
        $name = $itemRow['name'];
        $price = $itemRow['price'];
        $desc = $itemRow['desc'];
        $categoryId = $itemRow['categorie_id'];
        echo '<tr>
                <th scope="row">
                    <div class="p-2">
                    <img src="assets/img/pizza-'.$pizzaId. '.jpg" alt="" width="70" class="img-fluid rounded shadow-sm">
                    <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">'.$name. '</a>
                        </h5><span class="text-muted font-weight-normal font-italic d-block">Rs. ' .$price. '/-</span>
                    </div>
                    </div>
                </th>
                <td class="align-middle text-center"><strong>' .$quantity. '</strong></td>
            </tr>';
    }                                   
?>
                          