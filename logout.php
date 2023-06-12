<?php
    session_start();
    $_SESSION['name'] = "";
    $_SESSION['userID'] = ""; 
    $_SESSION['type'] = "";
    $_SESSION['advert'] = "";
    header('Location:index.php');
?>