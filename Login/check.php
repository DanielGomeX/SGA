<?php
    require '../Model/init.php';
    if(!isLoggedIn()){
        header('location: ../index.php');
    }
?>