<?php
            $id = $_GET['categoryid'];
            $sql = "SELECT * FROM `pizza` WHERE categorie_id = $id";
            $result = mysqli_query($conn, $sql);
            $noResult = true;
            while($row = mysqli_fetch_assoc($result)){
                $noResult = false;
                $pizzaId = $row['pizzaid'];
                $name = $row['name'];
                $price = $row['price'];
                $desc = $row['desc'];            
                echo '<div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="card" style="width: 18rem;">
                            <img src="/assets/img/pizza-'.$pizzaId. '.jpg" class="card-img-top" alt="image for this pizza" width="249px" height="270px">
                            <div class="card-body">
                                <h5 class="card-title">' . substr($name, 0, 20). '...</h5>
                                <h6 style="color: #ff0000">Rs. '.$price. '/-</h6>
                                <p class="card-text">' . substr($desc, 0, 29). '...</p>   
                                <div class="row justify-content-center">';
                                if($loggedin){
                                    $quaSql = "SELECT `quantity` FROM `cart` WHERE pizzaid = '$pizzaId' AND `user_id`='$userId'";
                                    $quaresult = mysqli_query($conn, $quaSql);
                                    $quaExistRows = mysqli_num_rows($quaresult);
                                    if($quaExistRows == 0) {
                                        echo '<form action="/controller/users/addToCart.php" method="POST">
                                              <input type="hidden" name="itemId" value="'.$pizzaId. '">
                                              <button type="submit" name="addToCart" class="btn btn-primary mx-2">Add to Cart</button>';
                                    }else {
                                        echo '<a href="/views/viewcart.php"><button class="btn btn-primary mx-2">Go to Cart</button></a>';
                                    }
                                }
                                else{
                                    echo '<button class="btn btn-primary mx-2" data-toggle="modal" data-target="#loginmodal">Add to Cart</button>';
                                }
                            echo '</form>                            
                                <a href="/views/viewPizza.php?pizzaid=' . $pizzaId . '" class="mx-2"><button class="btn btn-primary">View</button></a> 
                                </div>
                            </div>
                        </div>
                    </div>';
            }
            if($noResult) {
                echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-4">Sorry In this category No items available.</p>
                        <p class="lead"> We will update Soon.</p>
                    </div>
                </div> ';
            }
            ?>