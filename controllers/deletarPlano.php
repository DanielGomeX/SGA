<?php  
require_once '../Model/init.php';
    require_once '../Classes/Plano.class.php';
    
    
    $tipoplano = "";
    $formapagamento = "";
        
    //recupera o id da URL
    $cdplano = isset($_GET['cdplano']) ? $_GET['cdplano'] : null;
    
    $deletar = new Plano($cdplano, $tipoplano, $formapagamento);
    $deletar->ExcluirPlano($cdplano, $tipoplano, $formapagamento);