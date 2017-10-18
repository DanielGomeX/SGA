<?php
    require_once 'init.php';
    
    //recupera dados do formulário
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
    
    //inserir no banco
    $PDO = db_connect();
    $sql = "INSERT INTO modalidades(nm_professor,nm_modalidade,"
            . "qt_aulasem,qt_hraula)VALUES(:nomeprofessor,:nomemodalidade,"
            . ":qtdaulasemanal,:qtdhoraaula)";
    $stmt = $PDO->prepare($sql);
    $stmt = $PDO->bindParam(':nomeprofessor',$nomeprof);
    $stmt = $PDO->bindParam(':nomemodalidade',$nomemoda);
    $stmt = $PDO->bindParam(':qtdaulasemanal',$quantaula);
    $stmt = $PDO->bindParam(':qtdhoraaula',$horaaula);
    
    if($stmt->execute()){
        header('location: index.php');
    }else{
        echo '</br><font color="red">Ops! Erro ao cadastrar!</font>';
        print_r($stmt->errorInfo());
    }
?>