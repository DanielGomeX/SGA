<?php
    require_once '../Model/init.php';
    require_once '../Classes/Aluno.class.php';
    
    //recupera os valores do formulário
    $nome = isset($_POST['nome'] )? $_POST['nome']: null;
    $cpf = isset($_POST['cpf'] )? $_POST['cpf']: null;
    $rg = isset($_POST['rg'] )? $_POST['rg']: null;
    $endereco = isset($_POST['end'] )? $_POST['end']: null;
    $datanascimento = isset($_POST['dtnasc'] )? $_POST['dtnasc']: null;
    $telefone = isset($_POST['tel'] )? $_POST['tel']: null;
    $email = isset($_POST['email'] )? $_POST['email']: null;
    $id = isset($_POST['id'])? $_POST['id'] : null;
    
    $alterar = new Aluno($id,$nome,$rg,$cpf,$datanascimento,$endereco,$telefone,$email);
    $alterar->AlterarAluno($id,$nome,$rg,$cpf,$datanascimento,$endereco,$telefone,$email);
    
?>