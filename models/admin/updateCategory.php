<?php 
    $catsql = "SELECT * FROM `categories`";
    $catResult = mysqli_query($conn, $catsql);
    while($catRow = mysqli_fetch_assoc($catResult)){
        $categoryId = $catRow['id'];
        $categoryName = $catRow['name'];
        $categoryDesc = $catRow['desc'];
    include "../views/updateCategory.php";
    }
?>