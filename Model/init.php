<?php
  
// constantes com as credenciais de acesso ao banco MySQL
    if (!defined("DB_HOST")){
        define('DB_HOST', 'localhost');
    }
    if(!defined("DB_USER")){
        define('DB_USER', 'root');
    }
    if(!defined("DB_PASS")){
        define('DB_PASS', '');
    }
    if(!defined("DB_NAME")){
        define('DB_NAME', 'id2832957_sgabd');
    }
  
// habilita todas as exibições de erros
ini_set('display_errors', true);
error_reporting(E_ALL);
  
// inclui o arquivo de funçõees
require_once 'functions.php';
?>