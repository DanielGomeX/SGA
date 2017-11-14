<?php  
    require_once '../Model/init.php';
    require_once '../Classes/Pagamento.class.php';
    
    //recupera o id da URL
    
    $cdpagamento = isset($_GET['cdpagamento']) ? $_GET['cdpagamento'] : null;
    $nomealuno = "";
    $modalidade="";
    $mesreferente = "";
    $datavencimento = "";
    $valormensalidade = "";
    
    $deletar = new Pagamento($cdpagamento, $nomealuno, $modalidade,
            $valormensalidade, $mesreferente, $datavencimento);
    $deletar->ExcluirPagamento($cdpagamento, $nomealuno, $modalidade,
            $valormensalidade, $mesreferente, $datavencimento);