<?php  
    require_once '../Model/init.php';
    require_once '../Classes/Pagamento.class.php';
    
    //recupera o id da URL
    $cdpagamento = isset($_GET['cdpagamento']) ? $_GET['cdpagamento'] : null;
    
    $mesreferente = "";
    $datavencimento = "";
    $valormensalidade = "";
    
    $deletar = new Pagamento($cdpagamento, $mesreferente, $datavencimento, $valormensalidade);
    $deletar->ExcluirPagamento($cdpagamento, $mesreferente, $datavencimento, $valormensalidade);