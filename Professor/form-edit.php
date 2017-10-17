<?php
    require 'init.php';
    
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
    $sql = "SELECT nm_professor,registro_geral_professor,
            cpf_professor,dt_nascimento_professor,nm_endereco,
             nm_email_professor,cd_telefone_professor
             FROM professor
             WHERE id_professor = '$id'";
    
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // se o método fetch() não retornar um array, significa
    // que o ID não corresponde a um usuário válido.
    if(!is_array($user)){
        echo '</br><font color="red">Nenhum Usuário encontrado</font>';
        echo '<a href="index.php"> Voltar</a>';
        exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editar Professor</title>
     <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    
    <h1 align="center">Sistema de Gerenciamento de Academia</h1>
   
    <h2 align="center">Editar Professor</h2>
    
    <form action="edit.php" method="POST"  align='middle'>
        <label for="nome" class="cadastrofunc">Nome:</label>
        <input type="text" id="nome" name="nome" placeholder="Nome do professor"
               value="<?php echo $user['nm_professor']?>"/> <br/><br/>
        
        <label for="rg" class="cadastrofunc">RG:</label>
        <input type="text" id="rg" name="rg" placeholder="RG"
               value="<?php echo $user['registro_geral_professor']?>"/> <br/><br/>
        
        <label for="cpf" class="cadastrofunc">CPF:</label>
        <input type="text" id="cpf" name="cpf" placeholder="CPF"
               value="<?php echo $user['cpf_professor']?>"/> <br/><br/>
        
        <label for="dtnasc" class="cadastrofunc">Data de Nascimento:</label>
        <input type="date" id="dtnasc" name="dtnasc" placeholder="Data de nascimento"
               value="<?php echo $user['dt_nascimento_professor']?>"/> <br/><br/>
        
        <label for="endereço" class="cadastrofunc">Endereço:</label>
        <input type="text" id="end" name="end" placeholder="Endereço"
               value="<?php echo $user['nm_endereco']?>"/> <br/><br/>
        
        <label for="email" class="cadastrofunc">Email:</label>
        <input type="text" id="email" name="email" placeholder="E-mail"
               value="<?php echo $user['nm_email_professor']?>"/> <br/><br/>
        
        <label for="tel" class="cadastrofunc">Telefone:</label>
        <input type="text" id="tel" name="tel" placeholder="Telefone"
               value="<?php echo $user['cd_telefone_professor']?>"/> <br/><br/>
        
         <input type="hidden" name="id" value="<?php echo $id ?>"/>
         
        <label for="alterar" class="cadastrofunc"></label>
        <input type="submit" id="alterar" value="Alterar" /> 
        <input type="submit" name="voltar" value="Voltar" formaction="index.php"/> <br/>
    </form>
</body>
</html>
