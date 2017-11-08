<?php
 // Conecta com o MySQL usando PDO
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

    function dataatual(){
        // Formato 24 horas (de 1 a 24)
            $hora =  date_default_timezone_set('America/Sao_Paulo');
            $dataLocal = date(' d/m/Y H:i', time());
            if (($hora >= 0) AND ($hora < 6)) {
            $mensagem =  "Boa madrugada";
            } else if (($hora >= 6) AND ($hora < 12)) {
            $mensagem = "Bom dia";
            } else if (($hora >= 12) AND ($hora < 18)) {
            $mensagem = "Boa tarde";
            } else{
            $mensagem = "Boa noite";
            }
            return $mensagem.$dataLocal;
            }    
        
 ?>    