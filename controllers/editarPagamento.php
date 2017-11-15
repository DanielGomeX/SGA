<?php
    require_once '../Model/init.php';
    require_once '../Classes/Pagamento.class.php';
    
    //recupera os valores do formulário
    $cdpagamento = isset($_POST['cdpagamento'])? $_POST['cdpagamento']: null;
    
    $nomealuno = isset($_POST['nomealuno'])? $_POST['nomealuno']: null;
    $modalidade = isset($_POST['moda'])? $_POST['moda']: null;
    
    if($_POST['dtvencimento'] == 'dia 5'){
        $datavencimento = isset($_POST['dtvencimento'])? $_POST['dtvencimento']: null;
        
    }elseif ($_POST['dtvencimento'] == 'dia 10') {
        $datavencimento = isset($_POST['dtvencimento'])? $_POST['dtvencimento']: null;
        
    }else{
        $datavencimento = isset($_POST['dtvencimento'])? $_POST['dtvencimento']: null;
        
    }
    
    $mesreferente = isset($_POST['mesreferente'] )? $_POST['mesreferente']: null;
    $valormensalidade = isset($_POST['valormensalidade'] )? $_POST['valormensalidade']: null;
    
    
    $alterar = new Pagamento($cdpagamento, $nomealuno, $modalidade,
            $valormensalidade, $mesreferente, $datavencimento);
    $alterar->AlterarPagamento($cdpagamento, $nomealuno, $modalidade,
            $valormensalidade, $mesreferente, $datavencimento);