<?php
    require_once '../Model/init.php';
    //recupera o id da URL
    $codigo = isset($_GET['codigo']) ? $_GET['codigo'] : null;
    
    //valida ID
    if(empty($codigo)){
        echo '</br><font color="red">Codigo não informado</font>';
        exit;
    }
    //remove do banco
    $PDO = db_connect();
    $sql = "DELETE FROM plano WHERE cd_plano = :codigo";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);
    
    if($stmt->execute()){
        header('location: index.php');
    }else{
        echo '</br><font color="red">Erro ao remover!</font>';
        print_r($stmt->errorInfo());
    }
?>