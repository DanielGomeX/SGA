<?php
    require_once '../Model/init.php';
    require_once '../Classes/Plano.class.php';

	//recupera dados do formulário
    if($_POST['tipoplano'] == 'mensal'){
        $tipoplano = isset($_POST['tipoplano'])? $_POST['tipoplano']: null;
        
    }elseif($_POST['tipoplano'] == 'trimestral'){
        $tipoplano = isset($_POST['tipoplano'])? $_POST['tipoplano']: null;
        
    }elseif($_POST['tipoplano'] == 'semestral'){
        $tipoplano = isset($_POST['tipoplano'])? $_POST['tipoplano']: null;
        
    }else{
        $tipoplano = isset($_POST['tipoplano'])? $_POST['tipoplano']: null;
    }
    
    if($_POST['formapagamento'] == 'dinheiro'){
        $formapagamento = isset($_POST['formapagamento'] )? $_POST['formapagamento']: null;
        
    }elseif($_POST['formapagamento'] == 'cartaocredito'){
        $formapagamento = isset($_POST['formapagamento'] )? $_POST['formapagamento']: null;
        
    }else{
        $formapagamento = isset($_POST['formapagamento'] )? $_POST['formapagamento']: null;
    }
    
    
    $cdplano = isset($_POST['cdplano'] )? $_POST['cdplano']: null;
  
    //Objeto da classe
    $alterar= new Plano($cdplano, $tipoplano, $formapagamento);
    $alterar->AlterarPlano($cdplano, $tipoplano, $formapagamento);