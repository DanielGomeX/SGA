<?php
    require_once '../Model/init.php';
    require_once '../Classes/Pagamento.class.php';
        
    //recupera os valores do formulário
    $cdpagamento = "";
    
    if($_POST['dtvencimento'] == 'dia5'){
        $datavencimento = isset($_POST['dtvencimento'])? $_POST['dtvencimento']: null;
    }elseif ($_POST['dtvencimento'] == 'dia10') {
        $datavencimento = isset($_POST['dtvencimento'])? $_POST['dtvencimento']: null;
    }else{
        $datavencimento = isset($_POST['dtvencimento'])? $_POST['dtvencimento']: null;
    }
    var_dump($datavencimento);
    $mesreferente = isset($_POST['mesreferente'])? $_POST['mesreferente']: null;
    $valormensalidade = isset($_POST['valormensalidade'])? $_POST['valormensalidade']: null;
    $cadastrar = new Pagamento($cdpagamento, $mesreferente, $datavencimento, $valormensalidade);
    $cadastrar->CadastrarPagamento($cdpagamento, $mesreferente, $datavencimento, $valormensalidade);
    
    