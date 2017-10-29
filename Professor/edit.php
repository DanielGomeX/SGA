<?php
    require_once '../Model/init.php';
    
    //recupera os valores do formulário
    $nome = isset($_POST['nome'] )? $_POST['nome']: null;
    $rg = isset($_POST['rg'] )? $_POST['rg']: null;
    $cpf = isset($_POST['cpf'] )? $_POST['cpf']: null;
    $dtnasc = isset($_POST['dtnasc'] )? $_POST['dtnasc']: null;
    $endereco = isset($_POST['end'] )? $_POST['end']: null;
    $email = isset($_POST['email'] )? $_POST['email']: null;
    $telefone = isset($_POST['tel'] )? $_POST['tel']: null;
    $id = isset($_POST['id'])? $_POST['id'] : null;
    
    //validação(simples)
    if(empty($nome)|| empty($rg) || empty($cpf) || empty($dtnasc)||
        empty($endereco)||empty($email)|| empty($telefone)){
        echo '</br><font color="red">Volte e preencha os campos, por favor!</font>';
        echo '</br><a href="form-add.php">Voltar</a>';
        exit;
    }
    
    //atualiza o banco de dados
    $PDO = db_connect();
    $sql = "UPDATE professor SET nm_professor = :nome,
        registro_geral_professor = :rg,
        cpf_professor = :cpf,
        dt_nascimento_professor = :dtnasc,
        nm_endereco = :dtnasc,
        nm_email_professor = :email,
        cd_telefone_professor = :telefone 
        WHERE id_professor = :id";
    
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nome',$nome);
    $stmt->bindParam(':rg',$rg);
    $stmt->bindParam(':cpf',$cpf);
    $stmt->bindParam(':dtnasc',$dtnasc);
    $stmt->bindParam(':endereco',$endereco);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':telefone',$telefone);
    $stmt->bindParam(':id',$id, PDO::PARAM_INT);
    
    if($stmt->execute()){
        header('location: index.php');
    }else{
        echo '</br><font color="red">Erro ao alterar!</font>';
        echo '</br><a href="form-add.php">Voltar</a>';
        print_r($stmt->errorInfo());
    }
    
?>