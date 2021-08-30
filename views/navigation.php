<?php
  session_start();
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {   
    $loggedin= true;
    $userId = $_SESSION['user_id'];
    $userName = $_SESSION['loginusername'];
  } else {
    $loggedin = false;
    $userId = 0;
  }
    $sql = "SELECT * FROM `sitedetail`";
    $result = mysqli_query($conn, $sql);    
    $row = mysqli_fetch_assoc($result);
    $systemName = $row['systemName'];
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="/index.php">'.$systemName.'</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Top Categories
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
              $sql = "SELECT `name`, `id` FROM `categories`"; 
              $result = mysqli_query($conn, $sql);
              while($row = mysqli_fetch_assoc($result)){
                echo '<a class="dropdown-item" href="/views/viewPizzaList.php?categoryid=' .$row['id']. '">' .$row['name']. '</a>';
              }
              echo '</div>
          </li>                    
        </ul>
        <form method="get" action="/views/search.php" class="form-inline my-2 my-lg-0 mx-3">
          <input class="form-control mr-sm-2" type="search" name="search" id="search" placeholder="Search" aria-label="Search" required>
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>';
        $countSql = "SELECT SUM(`quantity`) FROM `cart` WHERE `user_id`=$userId"; 
        $countResult = mysqli_query($conn, $countSql);       
        $countRow = mysqli_fetch_assoc($countResult);     
       
        $count = $countRow['SUM(`quantity`)'];
        if(!$count) {
          $count = 0;
        }
        echo '<a href="/views/viewCart.php"><button type="button" class="btn btn-secondary mx-2" title="MyCart">
          <svg xmlns="/assets/img/cart.svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </svg>  
          <i class="bi bi-cart">Cart('.$count. ')</i>
        </button></a>';
        if($loggedin){
          echo '<ul class="navbar-nav mr-2">
          <li class="nav-item">
              <a class="nav-link" href="/views/viewOrder.php">Your Orders</a>
          </li>      
         
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"> Welcome ' .$userName. '</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../controller/users/logout.php">Logout</a>
              </div>
            </li>
          </ul>
          <div class="text-center image-size-small position-relative">
            <a href="/views/viewProfile.php"><img src="/assets/img/person-' .$userId. '.jpg" class="rounded-circle" onError="this.src = \'/assets/img/profilePic.jpg\'" style="width:40px; height:40px"></a>
          </div>';
        }else {
          echo '
          <button type="button" class="btn btn-success mx-2"  data-toggle="modal" data-target="#loginmodal">Login</button>
          <button type="button" class="btn btn-success mx-2"  data-toggle="modal" data-target="#signupmodal">SignUp</button>';
        }           
      echo '</div>
      </nav>';
      include 'loginModal.php';
      include 'signupModal.php';
      if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true") {
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> You can now login.
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
                </div>';
      }
      if(isset($_GET['error']) && $_GET['signupsuccess']=="false") {
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Warning!</strong> ' .$_GET['error']. '
                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
                </div>';
      }
      if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="true"){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success!</strong> You are logged in
                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
                </div>';
      }
      if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="false"){
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Warning!</strong> Invalid Credentials
                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
                </div>';
      }
?>

