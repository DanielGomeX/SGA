<?php
//recupera o ID da URL
    $id = isset($_GET['id'])? (int) $_GET['id']: null;
       
    //valida o ID
    if(empty($id)){
        echo $_SESSION['Error']="ID para alteração não definido";
        echo '<a href="index.php"> Voltar</a>';
        //exit;
    }
    
    //recupera os dados do usuário a ser editado
    $PDO = db_connect();
    $sql = "SELECT nm_aluno,
            registro_geral_aluno,
            cpf_aluno,
            dt_nascimento_aluno,
            nm_endereco,
            nm_email_aluno,
            cd_telefone_aluno,
            tipo_plano,
            nm_modalidade
            FROM aluno
            WHERE matricula_aluno = '$id'";
    
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // se o método fetch() não retornar um array, significa
    // que o ID não corresponde a um usuário válido.
    if(!is_array($user)){
        echo $_SESSION['Error']="Nenhum Usuário encontrado";
        echo '<a href="../Views/aluno.php"> Voltar</a>';
        //exit;
    }
?>