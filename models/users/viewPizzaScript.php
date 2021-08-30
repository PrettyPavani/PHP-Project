<?php
    $pizzaId = $_GET['pizzaid'];
    $sql = "SELECT * FROM `pizza` WHERE pizzaid = $pizzaId";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $price = $row['price'];
    $desc = $row['desc'];
    $categoryId = $row['categorie_id'];
?>
