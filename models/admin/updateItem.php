
<?php 
    $pizzasql = "SELECT * FROM `pizza`";
    $pizzaResult = mysqli_query($conn, $pizzasql);
    while($pizzaRow = mysqli_fetch_assoc($pizzaResult)){
        $pizzaId = $pizzaRow['pizzaid'];
        $name = $pizzaRow['name'];
        $price = $pizzaRow['price'];
        $categoryId = $pizzaRow['categorie_id'];
        $desc = $pizzaRow['desc'];
        include "../views/updateItem.php";

}?>