<?php
$sql = "SELECT * FROM `cart` WHERE `user_id`= $userId";
$result = mysqli_query($conn, $sql);
$counter = 0;
$totalPrice = 0;
while($row = mysqli_fetch_assoc($result)){
    $pizzaId = $row['pizzaid'];
    $quantity = $row['quantity'];    
    $mysql = "SELECT * FROM `pizza` WHERE pizzaid = $pizzaId";
    $myresult = mysqli_query($conn, $mysql);
    $myrow = mysqli_fetch_assoc($myresult);
    $name = $myrow['name'];
    $price = $myrow['price'];
    $total = $price * $quantity;
    $counter++;
    $totalPrice = $totalPrice + $total;
    echo '<tr>
            <td>' . $counter . '</td>
            <td>' . $name . '</td>
            <td>' . $price . '</td>
            <td>
                <form id="frm' . $pizzaId . '">
                    <input type="hidden" name="pizzaid" value="' . $pizzaId . '">
                    <input type="number" name="quantity" value="' . $quantity . '" class="text-center" onchange="updateCart(' . $pizzaId . ')" onkeyup="return false" style="width:60px" min=1 oninput="check(this)" onClick="this.select();">
                </form>
            </td>
            <td>' . $total . '</td>
            <td>
                <form action="../controller/users/cartController.php" method="POST">
                    <button name="removeItem" class="btn btn-sm btn-outline-danger ">Remove</button>
                    <input type="hidden" name="itemId" value="'.$pizzaId. '">
                </form>
            </td>
        </tr>';
}
