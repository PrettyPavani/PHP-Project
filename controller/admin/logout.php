<?php

    session_start();
    echo "Logging you out. Please wait...";
    unset($_SESSION["adminloggedin"]); 
    unset($_SESSION["adminusername"]);
    unset($_SESSION["adminuser_id"]);

    header("location: /index.php" );
?>
