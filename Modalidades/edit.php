<?php
    require_once '../Model/init.php';
    
    //recupera os valores do formulário
    $nomeprof = isset($_POST['professormoda'] )? $_POST['professormoda']: null;
    $nomemoda = isset($_POST['nomemoda'] )? $_POST['nomemoda']: null;
    $quantaula = isset($_POST['quantidadedaula'] )? $_POST['quantidadedaula']: null;
    $horaaula = isset($_POST['hraula'] )? $_POST['hraula']: null;
    
    //validação(simples)
   if (empty($nomeprof)|| empty($nomemoda) || empty($quantaula) || empty($horaaula))
    {
        echo '</br><font color="red">Volte e preencha os campos, por favor!</font>';
        exit;
    }
    
    //atualiza o banco de dados
    $PDO = db_connect();
    $sql = "UPDATE modalidade SET nm_professor = :nomeprofessor,"
            . "nm_modalidade = :nomemodalidade,"
            . "qt_aulasem = :qtdaulasemanal,"
            . "qt_hraula = :qtdhoraaula,"
            . "WHERE cd_modalidade = :id";
    $stmt = $PDO->prepare($sql);
    $stmt = $PDO->bindParam(':nomeprofessor',$nomeprof);
    $stmt = $PDO->bindParam(':nomemodalidade',$nomemoda);
    $stmt = $PDO->bindParam(':qtdaulasemanal',$quantaula);
    $stmt = $PDO->bindParam(':qtdhoraaula',$horaaula);
    $stmt = $PDO->bindParam(':id',$id, PDO::PARAM_INT);
    
    if($stmt->execute()){
        header('location: index.php');
    }else{
        echo '</br><font color="red">Erro ao alterar!</font>';
        print_r($stmt->errorInfo());
    }
    
?>