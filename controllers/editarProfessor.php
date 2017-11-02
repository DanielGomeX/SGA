<?php
    require_once '../Model/init.php';
    require_once '../Classes/Professor.class.php';
    
    //recupera os valores do formulário
    $nome = isset($_POST['nome'] )? $_POST['nome']: null;
    $rg = isset($_POST['rg'] )? $_POST['rg']: null;
    $cpf = isset($_POST['cpf'] )? $_POST['cpf']: null;
    $dtnasc = isset($_POST['dtnasc'] )? $_POST['dtnasc']: null;
    $endereco = isset($_POST['end'] )? $_POST['end']: null;
    $email = isset($_POST['email'] )? $_POST['email']: null;
    $telefone = isset($_POST['tel'] )? $_POST['tel']: null;
    $id = isset($_POST['id'])? $_POST['id'] : null;

    //validação(simples)
    if(empty($nome)|| empty($rg) || empty($cpf) || empty($dtnasc)||
        empty($endereco)||empty($email)|| empty($telefone)){
        echo '</br><font color="red">Volte e preencha os campos, por favor!</font>';
        echo '</br><a href="form-add.php">Voltar</a>';
        exit;
    }

	$editar = new Professor($id,$nome,$rg,$cpf,$dtnasc,$endereco,$email,$telefone);
	$editar->alterar($id,$nome,$rg,$cpf,$dtnasc,$endereco,$email,$telefone);
?>
   	