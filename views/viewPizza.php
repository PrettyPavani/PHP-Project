<!doctype html>
<html lang="en">
<head>    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title id=title>Pizza</title>
    <link rel = "icon" href ="/assets/img/logo.jpg" type = "image/x-icon">
    <style>
        #cont {
            min-height : 578px;
        }
    </style>
</head> 
<body>
    <?php include '../models/dbconnect.php';?>
    <?php require '../views/navigation.php';?>
    <div class="container my-4" id="cont">
        <div class="row jumbotron">
        <?php            
            include_once "../models/users/viewPizzaScript.php";
        ?>
        <script> document.getElementById("title").innerHTML = "<?php echo $name; ?>"; </script> 
        <?php
            echo  '<div class="col-md-4">
                        <img src="/assets/img/pizza-'.$pizzaId. '.jpg" width="249px" height="262px">
                    </div>
                    <div class="col-md-8 my-4">
                    <h3>' . $name . '</h3>
                    <h5 style="color: #ff0000">Rs. '.$price. '/-</h5>
                    <p class="mb-0">' .$desc .'</p>';
                    if($loggedin){                    
                        include_once "../models/users/viewPizzaScript1.php";
                    } else {
                        echo '<button class="btn btn-primary my-2" data-toggle="modal" data-target="#loginmodal">Add to Cart</button>';
                    }
                    echo '</form>
                    <h6 class="my-1"> View </h6>
                    <div class="mx-4">
                        <a href="viewPizzaList.php?categoryid=' . $categoryId . '" class="active text-dark">
                        <i class="fas fa-qrcode"></i>
                            <span>All Pizza</span>
                        </a>
                    </div>
                    <div class="mx-4">
                        <a href="/index.php" class="active text-dark">
                        <i class="fas fa-qrcode"></i>
                            <span>All Category</span>
                        </a>
                    </div>
                </div>'
            ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
</body>
</html>