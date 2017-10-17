<?php
    require 'init.php';
    
    //recupera o ID da URL
    $id = isset($_GET['id'])? (int) $_GET['id']: null;
    
    //valida o ID
    if(empty($id)){
        echo '</br><font color="red">ID para alteração não definido</font>';
        exit;
    }
    //recupera os dados do usuário a ser editado
    $PDO = db_connect();
    $sql = "SELECT professor(nm_professor,registro_geral_professor,"
            . "cpf_professor,dt_nascimento_professor,nm_endereco,"
            . "nm_email_professor,cd_telefone_professor FROM professor"
            . "WHERE id_professor = :id";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
    $stmt->execute();
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC); 
    
    // se o método fetch() não retornar um array, significa
    // que o ID não corresponde a um usuário válido.
    if(!is_array($user)){
        echo '</br><font color="red">Nenhum Usuário encontrado</font>';
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edição de Usuário</title>
     <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    
    <h1>Sistema de Gerenciamento de Academia</h1>
   
    <h2>Edição de Usuário</h2>
    
    <form action="edit.php" method="POST"  align='middle'>
        <label for="nome" class="cadastrofunc">Nome:</label>
        <input type="text" id="nome" placeholder="Nome do professor" /> <br/><br/>
        
        <label for="rg" class="cadastrofunc">RG:</label>
        <input type="text" id="rg" placeholder="RG"/> <br/><br/>
        
        <label for="cpf" class="cadastrofunc">CPF:</label>
        <input type="text" id="cpf" placeholder="CPF"/> <br/><br/>
        
        <label for="dtnasc" class="cadastrofunc">Data de Nascimento:</label>
        <input type="date" id="dtnasc" placeholder="Data de nascimento"/> <br/><br/>
        
        <label for="endereço" class="cadastrofunc">Endereço:</label>
        <input type="text" id="end" placeholder="Endereço"/> <br/><br/>
        
        <label for="email" class="cadastrofunc">Email:</label>
        <input type="text" id="email" placeholder="E-mail"/> <br/><br/>
        
        <label for="tel" class="cadastrofunc">Telefone:</label>
        <input type="text" id="tel" placeholder="Telefone"/> <br/><br/>
        
         <input type="hidden" name="id" value="<?php echo $id ?>">
         
        <label for="salvar" class="cadastrofunc"></label>
        <input type="submit" id="salvar" value="Salvar" /> 
        <input type="submit" name="alterar" value="Alterar" formaction="index.php" /> <br/>
    </form>
</body>
</html>
