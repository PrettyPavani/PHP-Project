<?php 

include "../models/users/config.php";

class PizzaService extends DBConnection{

    public function __construct(){
        parent::__construct();
    }

    public function catManage(){
        $sql = "SELECT * FROM `categories`"; 
        $result = $this->connection->query($sql);               

        // $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $catId = $row['id'];
            $catName = $row['name'];
            $catDesc = $row['desc'];    
            echo '<tr>
                    <td class="text-center"><b>' .$catId. '</b></td>
                    <td><img src="/assets/img/card-'.$catId. '.jpg" alt="image for this Category" width="150px" height="150px"></td>
                    <td>
                        <p>Name : <b>' .$catName. '</b></p>
                         <p>Description : <b class="truncate">' .$catDesc. '</b></p>
                     </td>
                    <td class="text-center">
                        <div class="row mx-auto" style="width:112px">
                        <button class="btn btn-sm btn-primary edit_cat" type="button" data-toggle="modal" data-target="#updateCat' .$catId. '">Edit</button>
                        <form action="../controller/admin/categoryController.php" method="POST">
                            <button name="removeCategory" class="btn btn-sm btn-danger" style="margin-left:9px;">Delete</button>
                            <input type="hidden" name="catId" value="'.$catId. '">
                        </form></div>
                    </td>
                </tr>';
        }
    }
   
    public function menuManage(){
        $sql = "SELECT * FROM `pizza`";
        $result = $this->connection->query($sql);               
        while($row = mysqli_fetch_assoc($result)){
            $pizzaId = $row['pizzaid'];
                $name = $row['name'];
                $price = $row['price'];
                $desc = $row['desc'];
                $categoryId = $row['categorie_id'];
                echo '<tr>
                    <td class="text-center">' .$categoryId. '</td>
                    <td>
                        <img src="/assets/img/pizza-'.$pizzaId. '.jpg" alt="image for this item" width="150px" height="150px">
                    </td>
                    <td>
                        <p>Name : <b>' .$name. '</b></p>
                        <p>Description : <b class="truncate">' .$desc. '</b></p>
                        <p>Price : <b>' .$price. '</b></p>
                    </td>
                    <td class="text-center">
					    <div class="row mx-auto" style="width:112px">
							<button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#updateItem' .$pizzaId. '">Edit</button>
								<form action="../models/admin/menu.php" method="POST">
									<button name="removeItem" class="btn btn-sm btn-danger" style="margin-left:9px;">Delete</button>
									<input type="hidden" name="pizzaId" value="'.$pizzaId. '">
							    </form>
						</div>
                    </td>
                    </tr>';
        }    
    }
    public function searchScript(){
        $noResult = true;
        $query = $_GET["search"];
        $sql = "SELECT * FROM `categories` WHERE `name` LIKE '%$query%'"; 
            // $result = mysqli_query($conn, $sql);
        $result = $this->connection->query($sql);             
        while($row = mysqli_fetch_array($result)){
            ?><script> document.getElementById("cat").innerHTML = "Category: ";</script> <?php 
            $noResult = false;
            $categoryId = $row['id'];
            $categoryname = $row['name'];
            $categorydesc = $row['desc'];                
                echo '<div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="/assets/img/card-'.$categoryId. '.jpg" class="card-img-top" alt="image for this pizza" width="249px" height="270px">
                        <div class="card-body">
                            <h5 class="card-title"><a href="/views/viewPizzaList.php?categoryid=' . $categoryId . '">' . $categoryname . '</a></h5>
                            <p class="card-text">' . substr($categorydesc, 0, 29). '...</p>
                            <a href="/views/viewPizzaList.php?categoryid=' . $categoryId . '" class="btn btn-primary">View All</a>
                        </div>
                    </div>
                </div>';
            }
            if($noResult) {
                echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1>Your search - <em>"' .$_GET['search']. '"</em> - No Result Found.</h1>
                        <p class="lead"> Suggestions: <ul>
                            <li>Make sure that all words are spelled correctly.</li>
                            <li>Try different keywords.</li>
                            <li>Try more general keywords.</li></ul>
                        </p>
                    </div>
                </div> ';
            }
    }

    public function siteScript(){
        $sql = "SELECT * FROM `sitedetail`";
        // $result = mysqli_query($conn, $sql);
        $result = $this->connection->query($sql);     

        $row = mysqli_fetch_assoc($result);
        $systemName = $row['systemName'];
        $address = $row['address'];
        $email = $row['email'];
        $contact1 = $row['contact1'];
        $contact2 = $row['contact2'];
    }

    public function viewCartScript(){
        $sql = "SELECT * FROM `cart` WHERE `id`= $userId";
        $result = $this->connection->query($sql);
        // $result = mysqli_query($conn, $sql);
        $counter = 0;
        $totalPrice = 0;
        while($row = mysqli_fetch_assoc($result)){
        $pizzaId = $row['pizzaid'];
        $quantity = $row['quantity'];
        $mysql = "SELECT * FROM `pizza` WHERE pizzaid = $pizzaId";
                            // $myresult = mysqli_query($conn, $mysql);
        $result = $this->connection->query($myresult);
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
        if($counter==0) {
        ?><script> document.getElementById("cont").innerHTML = '<div class="col-md-12 my-5"><div class="card"><div class="card-body cart"><div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3"><h3><strong>Your Cart is Empty</strong></h3><h4>Add something to make me happy :)</h4> <a href="/index.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">Continue Shopping</a> </div></div></div></div>';</script> <?php
        }
    }

    public function viewProfileScript()
    {        
        $sql = "SELECT * FROM users WHERE `user_id`=$userId";             
        $result = $this->connection->query($sql);
        $row=mysqli_fetch_assoc($result);
        $userName = $row['username'];
        $firstName = $row['firstname'];
        $lastName = $row['lastname'];
        $email = $row['email'];
        $phone = $row['phone'];
        $userType = $row['usertype'];
        if($userType == 0) {
            $userType = "User";
        } else {
            $userType = "Admin";
        }
    }

    public function itemModalScript(){
        $mysql = "SELECT * FROM `orderitems` WHERE order_id = '$orderId'";
        // $myresult = mysqli_query($conn, $mysql);
        $myresult = $this->connection->query($mysql);
        while($myrow = mysqli_fetch_assoc($myresult)){
            $pizzaId = $myrow['pizzaid'];
            $quantity = $myrow['quantity'];                                        
            $itemSql = "SELECT * FROM `pizza` WHERE pizzaid = $pizzaId";
            // $itemResult = mysqli_query($conn, $itemSql);
            $itemResult = $this->connection->query($itemSql);
            $itemRow = mysqli_fetch_assoc($itemResult);
            $name = $itemRow['name'];
            $price = $itemRow['price'];
            $desc = $itemRow['desc'];
            $categoryId = $itemRow['categorie_id'];
            echo '<tr>
                <th scope="row">
                    <div class="p-2">
                        <img src="/assets/img/pizza-'.$pizzaId. '.jpg" alt="" width="70" class="img-fluid rounded shadow-sm">
                        <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> '.$name. '</h5><span class="text-muted font-weight-normal font-italic d-block">Rs. ' .$price. '/-</span>
                    </div>                                                    
                    </div>
                    </th>
                    <td class="align-middle text-center"><strong>' .$quantity. '</strong></td>
                </tr>';
        }
    }

    public function viewPizzaListScript(){
        $id = $_GET['categoryid'];
        $sql = "SELECT * FROM `categories` WHERE id = $id";
        // $result = mysqli_query($conn, $sql);
        $result = $this->connection->query($sql);
        while($row = mysqli_fetch_assoc($result)){
            $categoryname = $row['name'];
            $categorydesc = $row['desc'];
        }
    }

    public function viewPizzaScript(){
        $pizzaId = $_GET['pizzaid'];
        $sql = "SELECT * FROM `pizza` WHERE pizzaid = $pizzaId";
        $result = $this->connection->query($sql);
        // $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $price = $row['price'];
        $desc = $row['desc'];
        $categoryId = $row['categorie_id'];
    }

    public function orderManageScript(){
        $sql = "SELECT * FROM `orders`";
        $result = $this->connection->query($sql);
        $counter = 0;
        while($row = mysqli_fetch_assoc($result)){
            $userId = $row['user_id'];
            $orderId = $row['order_id'];
            $address = $row['address'];
            $zipcode = $row['zipcode'];
            $phoneno = $row['phoneno'];
            $amount = $row['amount'];
            $createdate = $row['createdate'];
            $paymentmode = $row['paymentmode'];
            if($paymentmode == 0) {
                $paymentmode = "Cash on Delivery";
            }else {
                $paymentmode = "Online";
            }
                $status = $row['status'];
                $counter++;                         
                echo '<tr>
                        <td>' . $orderId . '</td>
                        <td>' . $userId . '</td>
                        <td data-toggle="tooltip" title="' .$address. '">' . substr($address, 0, 20) . '...</td>
                        <td>' . $phoneno . '</td>
                        <td>' . $amount . '</td>
                        <td>' . $paymentmode . '</td>
                        <td>' . $createdate . '</td>
                        <td><a href="#" data-toggle="modal" data-target="#status' . $orderId . '" class="view"><i class="material-icons">&#xE5C8;</i></a></td>
                        <td><a href="#" data-toggle="modal" data-target="#orderItem' . $orderId . '" class="view" title="View Details"><i class="material-icons">&#xE5C8;</i></a></td>
                    </tr>';
                }                
                    if($counter==0) {
                        ?><script> document.getElementById("NoOrder").innerHTML = '<div class="alert alert-info alert-dismissible fade show" role="alert" style="width:100%"> You have not Recieve any Order!	</div>';</script> <?php
                    }           
    }

    public function viewOrderScript(){
        $sql = "SELECT * FROM `orders` WHERE `userId`= $userId";
        $result = $this->connection->query($sql);
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
            }else {
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
                    <?php       }
    }
    public function orderItemScript(){
        $mysql = "SELECT * FROM `orderitems` WHERE order_id = $orderId";
        // $myresult = mysqli_query($conn, $mysql);
        $myresult = $this->connection->query($mysql);

        while($myrow = mysqli_fetch_assoc($myresult)){
            $pizzaId = $myrow['pizzaid'];
            $quantity = $myrow['quantity'];                                        
            $itemSql = "SELECT * FROM `pizza` WHERE pizzaid = $pizzaId";
            // $itemResult = mysqli_query($conn, $itemSql);
            $itemResult = $this->connection->query($itemSql);

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
                                    
    }
    public function viewCart(){        
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
        if($counter==0) {
            ?><script> document.getElementById("cont").innerHTML = '<div class="col-md-12 my-5"><div class="card"><div class="card-body cart"><div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3"><h3><strong>Your Cart is Empty</strong></h3><h4>Add something to make me happy :)</h4> <a href="/index.php" class="btn btn-primary cart-btn-transform m-3" data-abc="true">Continue Shopping</a> </div></div></div></div>';</script> <?php
        }
     
    }
}



                          
?> 