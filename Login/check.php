<?php
    require '../Model/init.php';
    if(!isLoggedIn()){
        header('location: form-login.php');
    }
?>