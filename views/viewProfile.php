<!DOCTYPE HTML>
<html lang="en">
<head>   
    <title>Profile </title>
    <link rel = "icon" href ="/assets/img/logo.jpg" type = "image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href='/assets/css/viewprofilestyle.css'>
</head>
<body>
    <?php include '../models/dbconnect.php';?>
    <?php require '../views/navigation.php' ?>
    <?php
        if($loggedin) {
    ?>    
    <div class="container">
        <?php   
            include_once "../models/script.php";
            $result = new PizzaService();
            $manageResult = $result->viewProfileScript();
        ?>       
        <div class="row">
            <div class="jumbotron p-3 mb-3" style="display: flex;justify-content: center;width: 28%;border-radius: 50px;margin: 0 auto;">
                <div class="user-info">
                    <img class="rounded-circle mb-3 bg-dark" src="/assets/img/person-<?php echo $userId; ?>.jpg" onError="this.src = '/assets/img/profilePic.jpg'" style="width:215px;height:215px;padding:1px;">
                    <ul class="meta list list-unstyled" style="text-align:center;">
                        <li class="username my-2"><a href="viewProfile.php"></a></li>                        
                        <li class="my-2"><a href="../controller/users/logout.php"><button class="btn btn-secondary" style="font-size: 15px;padding: 3px 8px;">Logout</button></a></li>
                    </ul>
                </div>
            </div>
            <div class="content-panel mb-3" style="display: flex;justify-content: center;">
                <div class="border p-3" style="border: 2px solid rgba(0, 0, 0, 0.1);border-radius: 1.1rem;background-color: aliceblue;">
                    <h2 class="title text-center">Profile<span class="pro-label label label-warning"> (<?php echo $userType ?>)</span></h2>
                
                    <form action="/controller/users/profileController.php" method="post">
                        <div class="form-group">
                            <b><label for="username">Username:</label></b>
                            <input class="form-control" id="username" name="username" type="text" disabled value="<?php echo $userName ?>">
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <b><label for="firstname">First Name:</label></b>
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" required value="<?php echo $firstName ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <b><label for="lastname">Last Name:</label></b>
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name" required value="<?php echo $lastName ?>">
                        </div>
                        </div>
                        <div class="form-group">
                            <b><label for="email">Email:</label></b>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" required value="<?php echo $email ?>">
                        </div>
                        <div class="form-row">
                            <div class="form-group  col-md-6">
                                <b><label for="phone">Phone No:</label></b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon">+91</span>
                                    </div>
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone Number" required pattern="[0-9]{10}" maxlength="10" value="<?php echo $phone ?>">
                                </div>
                            </div>                            
                        </div>
                        <button type="submit" name="updateProfileDetail" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
        }
        else {
            echo '<div id="notfound">
                <div class="notfound">
                    <div class="notfound-404">
                        <h1>Oops!</h1>
                    </div>
                    <h2>404 - Page not found</h2>
                    <a href="/index.php">Go To Homepage</a>
                </div>
            </div>';
        }
    ?>    
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>         
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    <script>
        $('#image').change(function() {
            var i = $(this).prev('button').clone();
            var file = ($('#image')[0].files[0].name).substring(0, 5) + "..";
            $(this).prev('button').text(file);
        });
    </script>
</body>

</html>
