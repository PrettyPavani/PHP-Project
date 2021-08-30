<?php
$quaSql = "SELECT `quantity` FROM `cart` WHERE pizzaid = '$pizzaId' AND `user_id`='$userId'";
$quaResult = mysqli_query($conn, $quaSql);
$quaExistRows = mysqli_num_rows($quaResult);
    if($quaExistRows == 0) {
        echo '<form action="/controller/users/addToCart.php" method="POST">
            <input type="hidden" name="itemId" value="'.$pizzaId. '">
            <button type="submit" name="addToCart" class="btn btn-primary my-2">Add to Cart</button>';
                    }else {
                        echo '<a href="/views/viewCart.php"><button class="btn btn-primary my-2">Go to Cart</button></a>';
                    }


