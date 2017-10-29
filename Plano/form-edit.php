<?php
    require_once '../Model/init.php';
    
    //recupera o ID da URL
    $codigo = isset($_GET['codigo'])? (int) $_GET['codigo']: null;
    
    //valida o ID
    if(empty($codigo)){
        echo '</br><font color="red">ID para alteração não definido</font>';
        echo '<a href="index.php"> Voltar</a>';
        exit;
    }
    
    //recupera os dados do usuário a ser editado
    $PDO = db_connect();
    $sql = "SELECT cd_plano,
                   vl_plano,
                   dt_plano
            FROM plano
            WHERE cd_plano = '$codigo'";
    
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);
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
    <title>Edição de Usuário</title>
     <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
    <center>
<body>
    
    <h1>Sistema de Gerenciamento de Academia</h1>
    <h2>Edição de Plano</h2>
    
    <form action="edit.php" method="POST"  align='middle'>
        <label for="codigo" class="cadastrofunc">Código do Plano:</label>
        <input type="text" id="codigo" name="codigo" placeholder="Código do Plano"
               value="<?PHP echo $user['cd_plano'] ?>"/> <br/><br/>
        
        <label for="valorplano" class="cadastrofunc">Valor do Plano:</label>
        <input type="text" id="valorplano" name="valorplano" placeholder="Valor do Plano"
               value="<?PHP echo $user['vl_plano'] ?>"/> <br/><br/>
        
        <label for="data" class="cadastrofunc">Data:</label>
        <input type="text" id="data" name="data" placeholder="Data" readonly="true"
               value="<?PHP echo $user['dt_plano'] ?>" /> <br/><br/>
        
        <input type="hidden" name="codigo" value="<?php echo $codigo ?>"/>
         
        <label for="alterar" class="cadastrofunc"></label>
        <button id="alterar" >Alterar</button>
        <button id="salvar" formaction="index.php">Voltar</button>
    </form>
</body>
    </center>
</html>
