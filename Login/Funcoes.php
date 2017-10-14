<?php
//Conecta no banco usando PDO
function db_connect(){
    $PDO = new PDO('mysql:host=' .DB_HOST. ';dbname='.DB_NAME. ';charset=utf8',
            DB_USER, DB_PASS);
    return $PDO;
}
//cria o hash da senha usando sha1
function make_hash($str){
    return sha1($str);
}
//verifica se o usuario está logado
function isLoggedIn(){
    if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !==true){
        return false;
    }
    return true;
}
?>