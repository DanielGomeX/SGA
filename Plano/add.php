<?php
    require_once '../Model/init.php';
    
    //recupera dados do formulário
    $codigo = isset($_POST['codigo'] )? $_POST['codigo']: null;
    $valorplano = isset($_POST['valorplano'] )? $_POST['valorplano']: null;
    $data = isset($_POST['data'] )? $_POST['data']: null;
    
    
    //validação(simples)
    if(empty($codigo)|| empty($valorplano) || empty($data)){
        echo '</br><font color="red">Volte e preencha os campos, por favor!</font>';
        echo '<a href="form-add.php">Voltar</a>';
        exit;
    }
    
    //inserir no banco
    $PDO = db_connect();
    $sql = "INSERT INTO plano(cd_plano, vl_plano,dt_plano)VALUES(:codigo, :valorplano, :data)";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':codigo' ,$codigo);
    $stmt->bindParam(':valorplano' ,$valorplano);
    $stmt->bindParam(":data", $data);
    
    if($stmt->execute()){
        header('location: index.php');
    }else{
        echo '</br><font color="red">Ops! Erro ao cadastrar!</font>';
        print_r($stmt->errorInfo());
    }
?>