<?php
    require_once '../Model/init.php';
    
    //recupera os valores do formulário
    $codigo = isset($_POST['codigo'] )? $_POST['codigo']: null;
    $valorplano = isset($_POST['valorplano'] )? $_POST['valorplano']: null;
    $data = isset($_POST['data'] )? $_POST['data']: null;
    
    //validação(simples)
    if(empty($codigo)|| empty($valorplano) || empty($data)){
        echo '</br><font color="red">Volte e preencha os campos, por favor!</font>';
        exit;
    }
    
    //atualiza o banco de dados
    $PDO = db_connect();
    $sql = "UPDATE plano SET cd_plano = :codigo, vl_plano = :valorplano, dt_plano = :data
        WHERE cd_plano = :codigo";
    
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':codigo',$codigo, PDO::PARAM_INT);
    $stmt->bindParam(':valorplano' ,$valorplano);
    $stmt->bindParam(":data", $data);
    
    if($stmt->execute()){
        header('location: index.php');
    }else{
        echo '</br><font color="red">Erro ao alterar!</font>';
        print_r($stmt->errorInfo());
    }
    
?>