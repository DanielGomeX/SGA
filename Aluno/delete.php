<?php
    require_once '../Model/init.php';
    require_once '../Classes/Aluno.class.php';
    
    //recupera o id da URL
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    
    $deletar = new Aluno($id, $nome, $rg, $cpf,
            $datanascimento, $endereco, $telefone, $email);
    $deletar->Excluir($id);


/*
    require_once '../Model/init.php';
    //recupera o id da URL
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    
    //valida ID
    if(empty($id)){
        echo '</br><font color="red">ID não informado</font>';
        exit;
    }
    //remove do banco
    $PDO = db_connect();
    $sql = "DELETE FROM aluno WHERE matricula_aluno = :id";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
    if($stmt->execute()){
        header('location: index.php');
    }else{
        echo '</br><font color="red">Erro ao remover!</font>';
        print_r($stmt->errorInfo());
    }
 */