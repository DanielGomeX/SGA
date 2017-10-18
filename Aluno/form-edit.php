<?php
    require '../Model/init.php';
    
    //recupera o ID da URL
    $id = isset($_GET['id'])? (int) $_GET['id']: null;
       
    //valida o ID
    if(empty($id)){
        echo '</br><font color="red">ID para alteração não definido</font>';
        echo '<a href="index.php"> Voltar</a>';
        exit;
    }
    
    //recupera os dados do usuário a ser editado
    $PDO = db_connect();
    $sql = "SELECT nm_aluno,
            cpf_aluno,
            registro_geral_aluno,
            nm_endereco,
            dt_nascimento_aluno,
            cd_telefone_aluno,
            nm_email_aluno 
             FROM aluno
             WHERE matricula_aluno = '$id'";
    
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    //print_r($user);
    // se o método fetch() não retornar um array, significa
    // que o ID não corresponde a um usuário válido.
    if(!is_array($user)){
        echo '</br><font color="red">Nenhum aluno encontrado</font>';
        echo '<a href="index.php"> Voltar</a>';
        echo'PIROCA TORTONA';
        exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edição de Aluno</title>
     <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<center>
    <h1>Sistema de Gerenciamento de Academia</h1>
   
    <h2>Edição de Aluno</h2>
    
    <form action="edit.php" method="POST"  align='middle'>
        <label for="nome" class="cadastrofunc">Nome:</label>
        <input type="text" id="nome" name="nome" placeholder="Nome do professor"
               value="<?php echo $user['nm_aluno']?>"/> <br/><br/>
        
        <label for="rg" class="cadastrofunc">RG:</label>
        <input type="text" id="rg" maxlength="11" name="rg" placeholder="RG"
               value="<?php echo $user['registro_geral_aluno']?>"/> <br/><br/>
        
        <label for="cpf" class="cadastrofunc">CPF:</label>
        <input type="text" maxlength="14" id="cpf" name="cpf" placeholder="CPF"
               value="<?php echo $user['cpf_aluno']?>"/> <br/><br/>
        
        <label for="dtnasc" class="cadastrofunc">Data de Nascimento:</label>
        <input type="date" id="dtnasc" name="dtnasc" placeholder="Data de nascimento"
               value="<?php echo $user['dt_nascimento_aluno']?>"/> <br/><br/>
        
        <label for="endereço" class="cadastrofunc">Endereço:</label>
        <input type="text" id="end" name="end" placeholder="Endereço"
               value="<?php echo $user['nm_endereco']?>"/> <br/><br/>
        
        <label for="email" class="cadastrofunc">Email:</label>
        <input type="email" id="email" name="email" placeholder="E-mail"
               value="<?php echo $user['nm_email_aluno']?>"/> <br/><br/>
        
        <label for="tel" class="cadastrofunc">Telefone:</label>
        <input type="tel" id="tel" name="tel" placeholder="Telefone"
               value="<?php echo $user['cd_telefone_aluno']?>"/> <br/><br/>
        
         <input type="hidden" name="id" value="<?php echo $id ?>"/>
         
        <label for="alterar" class="cadastrofunc"></label>
        <button id="salvar" >Alterar</button>
        <button id="salvar" formaction="index.php">Voltar</button>
        
    </form>
</center>
</body>
</html>
