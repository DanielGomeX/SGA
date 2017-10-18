<?php
    require_once '../Model/init.php';
    
    //recupera dados do formulário
    $nome = isset($_POST['nome'] )? $_POST['nome']: null;
    $cpf = isset($_POST['cpf'] )? $_POST['cpf']: null;
    $rg = isset($_POST['rg'] )? $_POST['rg']: null;
    $endereco = isset($_POST['end'] )? $_POST['end']: null;
    $dtnasc = isset($_POST['dtnasc'] )? $_POST['dtnasc']: null;
    $telefone = isset($_POST['tel'] )? $_POST['tel']: null;
    $email = isset($_POST['email'] )? $_POST['email']: null;
    
    //validação(simples)
    if(empty($nome)|| empty($rg) || empty($cpf) || empty($dtnasc)||
        empty($endereco)||empty($email)|| empty($telefone)){
      
        echo '</br><font color="red">Volte e preencha os campos, por favor!</font>';
        echo '<a href="form-add.php">Voltar</a>';
        exit;
    }
    
    //inserir no banco
    $PDO = db_connect();
    $sql = "INSERT INTO aluno(nm_aluno, cpf_aluno,
            registro_geral_aluno, nm_endereco, dt_nascimento_aluno,
            cd_telefone_aluno, nm_email_aluno)VALUES(:nome, :cpf, :rg, :endereco,
            :dtnasc, :telefone, :email)";
    
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nome' ,$nome);
    $stmt->bindParam(':cpf' ,$cpf);
    $stmt->bindParam(':rg' ,$rg);
    $stmt->bindParam(':endereco' ,$endereco);
    $stmt->bindParam(':dtnasc' ,$dtnasc);
    $stmt->bindParam(':telefone' ,$telefone);
    $stmt->bindParam(':email' ,$email);
        
    if($stmt->execute()){
        header('location: index.php');
    }else{
        echo '</br><font color="red">Ops! Erro ao cadastrar!</font>';
        print_r($stmt->errorInfo());
    }
?>