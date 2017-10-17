<?php
    require_once 'init.php';
    
    //recupera dados do formulário
    $nome = isset($_POST['nome'] )? $_POST['nome']: null;
    $rg = isset($_POST['rg'] )? $_POST['rg']: null;
    $cpf = isset($_POST['cpf'] )? $_POST['cpf']: null;
    $dtnasc = isset($_POST['dtnasc'] )? $_POST['dtnasc']: null;
    $endereco = isset($_POST['end'] )? $_POST['end']: null;
    $email = isset($_POST['email'] )? $_POST['email']: null;
    $telefone = isset($_POST['tel'] )? $_POST['tel']: null;
    
    //validação(simples)
    if(empty($nome)|| empty($rg) || empty($cpf) || empty($dtnasc)||
        empty($endereco)||empty($email)|| empty($telefone)){
        echo '</br><font color="red">Volte e preencha os campos, por favor!</font>';
        exit;
    }
    
    //inserir no banco
    $PDO = db_connect();
    $sql = "INSERT INTO professor(nm_professor,registro_geral_professor,"
            . "cpf_professor,dt_nascimento_professor,nm_endereco,"
            . "nm_email_professor,cd_telefone_professor)VALUES(:nome,:rg,:cpf,"
            . ":dtnasc,:endereco,:email,:telefone)";
    $stmt = $PDO->prepare($sql);
    $stmt = $PDO->bindParam(':nome',$nome);
    $stmt = $PDO->bindParam(':rg',$rg);
    $stmt = $PDO->bindParam(':cpf',$cpf);
    $stmt = $PDO->bindParam(':dtnasc',$dtnasc);
    $stmt = $PDO->bindParam(':endereco',$endereco);
    $stmt = $PDO->bindParam(':email',$email);
    $stmt = $PDO->bindParam(':telefone',$telefone);
    
    if($stmt->execute()){
        header('location: index.php');
    }else{
        echo '</br><font color="red">Ops! Erro ao cadastrar!</font>';
        print_r($stmt->errorInfo());
    }
?>