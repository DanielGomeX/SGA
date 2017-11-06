<?php  
require_once '../Model/init.php';
    require_once '../Classes/Plano.class.php';
    
    
    $tipoplano = "";
    $formapagamento = "";
    $modalidade = "";
        
    //recupera o id da URL
    $cdplano = isset($_GET['cdplano']) ? $_GET['cdplano'] : null;
    
    $deletar = new Plano($cdplano, $tipoplano, $formapagamento, $modalidade);
    $deletar->ExcluirPlano($cdplano, $tipoplano, $formapagamento, $modalidade);