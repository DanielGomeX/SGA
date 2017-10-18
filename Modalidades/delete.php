<?php
    require_once '../Model/init.php';
    //recupera o id da URL
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    
    //valida ID
    if(empty($id)){
        echo '</br><font color="red">ID não informado</font>';
        echo '</br><a href="form-add.php">Voltar</a>';
        exit;
    }
    //remove do banco
    $PDO = db_connect();
    $sql = "DELETE FROM modalidade WHERE cd_modalidade = :id";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
    if($stmt->execute()){
        header('location: index.php');
    }else{
        echo '</br><font color="red">Erro ao remover!</font>';
        echo '</br><a href="form-add.php">Voltar</a>';
        print_r($stmt->errorInfo());
    }
?>