<?php
    require_once '../Model/init.php';
    
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
    $sql2 = "SELECT nm_professor, ";
    
    $sql = "SELECT nm_modalidade,
            qt_aulasem,qt_hraula
             FROM modalidade
             WHERE id_modalidade = '$id'";
    
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
    <title>Editar Modalidade</title>
     <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    
    <h1 align="center">Sistema de Gerenciamento de Academia</h1>
   
    <h2 align="center">Editar Professor</h2>
    
    <form action="edit.php" method="POST"  align='middle'>
        <label for="professormoda" class="cadastrofunc">Nome:</label>
        <input type="text" id="professormoda" name="professormoda" placeholder="Nome do professor"
               value="<?php echo $user['nm_professor']?>"/> <br/><br/>
        
        <label for="nomemoda" class="cadastrofunc">RG:</label>
        <input type="text" id="nomemoda" name="nomemoda" placeholder="Nome Modalidade"
               value="<?php echo $user['nm_modalidade']?>"/> <br/><br/>
        
        <label for="quantidadedaula" class="cadastrofunc">CPF:</label>
        <input type="text" id="quantidadedaula" name="quantidadedaula" placeholder="Quantidade Aula"
               value="<?php echo $user['qt_aulasem']?>"/> <br/><br/>
        
        <label for="hraula" class="cadastrofunc">Data de Nascimento:</label>
        <input type="date" id="hraula" name="hraula" placeholder="Horas Aula"
               value="<?php echo $user['qt_hraula']?>"/> <br/><br/>
        
         <input type="hidden" name="id" value="<?php echo $id ?>"/>
                
        <label for="alterar" class="cadastrofunc"></label>
        <button id="salvar" >Alterar</button>
        <button id="voltar" formaction="index.php">Voltar</button>
    </form>
</body>
</html>
