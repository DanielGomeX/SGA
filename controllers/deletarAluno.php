<?php
    require_once '../Model/init.php';
    require_once '../Classes/Aluno.class.php';
    
    $id = "";
    $nome = "";
    $rg = "";
    $cpf = "";
    $datanascimento = "";
    $endereco = "";
    $telefone = "";
    $email = "";
    $tipoplano = "";
    $modalidade = "";
    //recupera o id da URL
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    
    $deletar = new Aluno($id, $nome, $rg, $cpf, $datanascimento, $endereco,
            $telefone, $email, $tipoplano, $modalidade);
    $deletar->ExcluirAluno($id, $nome, $rg, $cpf, $datanascimento, $endereco,
            $telefone, $email, $tipoplano, $modalidade);

