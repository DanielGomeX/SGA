<?php
    require_once 'init.php';
    
    //recupera os valores do formulário
    $nome = isset($_POST['nome'] )? $_POST['nome']: null;
    $cpf = isset($_POST['cpf'] )? $_POST['cpf']: null;
    $rg = isset($_POST['rg'] )? $_POST['rg']: null;
    $endereco = isset($_POST['end'] )? $_POST['end']: null;
    $dtnasc = isset($_POST['dtnasc'] )? $_POST['dtnasc']: null;
    $telefone = isset($_POST['tel'] )? $_POST['tel']: null;
    $email = isset($_POST['email'] )? $_POST['email']: null;
    $id = isset($_POST['id'])? $_POST['id'] : null;
    
    //validação(simples)
    if(empty($nome)|| empty($rg) || empty($cpf) || empty($dtnasc)||
        empty($endereco)||empty($email)|| empty($telefone)){
        echo '</br><font color="red">Volte e preencha os campos, por favor!</font>';
        exit;
    }
    
    //atualiza o banco de dados
    $PDO = db_connect();
    $sql = "UPDATE aluno SET 
        nm_aluno = :nome,
        cpf_aluno = :cpf,
        registro_geral_aluno = :rg,
        nm_endereco = :endereco,
        dt_nascimento_aluno = :dtnasc,
        cd_telefone_aluno = :telefone, 
        nm_email_aluno = :email
        WHERE matricula_aluno = :id";
    
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nome',$nome);
    $stmt->bindParam(':cpf',$cpf);
    $stmt->bindParam(':rg',$rg);
    $stmt->bindParam(':endereco',$endereco);
    $stmt->bindParam(':dtnasc',$dtnasc);
    $stmt->bindParam(':telefone',$telefone);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':id',$id, PDO::PARAM_INT);
    
    if($stmt->execute()){
        header('location: index.php');
    }else{
        echo '</br><font color="red">Erro ao alterar!</font>';
        print_r($stmt->errorInfo());
    }
    
?>