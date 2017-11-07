<?php
    require_once '../Model/init.php';
    require_once '../Classes/Pagamento.class.php';
    
    //recupera os valores do formulário
    $cdpagamento = isset($_POST['cdpagamento']) ? $_POST['cdpagamento'] : null;
    $mesreferente = isset($_POST['mesreferente'] )? $_POST['mesreferente']: null;
    $datavencimento = isset($_POST['datavencimento'] )? $_POST['datavencimento']: null;
    $valormensalidade = isset($_POST['valormensalidade'] )? $_POST['valormensalidade']: null;
    
    
    $alterar = new Pagamento($cdpagamento, $mesreferente, $datavencimento, $valormensalidade);
    $alterar->AlterarPagamento($cdpagamento, $mesreferente, $datavencimento, $valormensalidade);
?>