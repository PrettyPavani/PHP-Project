<?php
    session_start();
    echo "Logging you out. Please wait...";
    unset($_SESSION["loggedin"]);
    unset($_SESSION["username"]);
    unset($_SESSION["user_id"]);
    header("Location: /index.php");

?>