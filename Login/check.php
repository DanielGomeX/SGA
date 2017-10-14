<?php
    require_once 'inicializar.php';
    if(!isLoggedIn()){
        header('location: form-login.php');
    }
?>