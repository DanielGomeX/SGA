<?php
	require_once '../Classes/Professor.class.php';

	$nome="";
	$rg="";
	$cpf="";
	$dtnasc="";
	$endereco="";
	$email="";
	$telefone="";
	
	//recupera o id da URL
    $id = isset($_GET['id']) ? $_GET['id'] : null;

	$deletar = new Professor($id,$nome,$rg,$cpf,$dtnasc,$endereco,$email,$telefone);

	$deletar->excluir($id);
?>

	