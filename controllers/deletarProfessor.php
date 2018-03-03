<?php
        require_once '../controllers/header.php';
        
	$id = "";
        $nome="";
	$rg="";
	$cpf="";
	$dtnasc="";
	$endereco="";
	$email="";
	$telefone="";
        $modalidade ="";
	
	//recupera o id da URL
    $id = isset($_GET['id']) ? $_GET['id'] : null;

	$deletar = new Professor($id,$nome,$rg,$cpf,$dtnasc,$endereco,$email,$telefone,$modalidade);

	$deletar->ExcluirProfessor($id,$nome,$rg,$cpf,$dtnasc,$endereco,$email,$telefone,$modalidade);
?>

	