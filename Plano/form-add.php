<?php
    require_once '../Model/init.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulario de Cadastro</title>
     <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <center>
    <h1>Sistema de Gerenciamento de Academia</h1>
   
    <h2>Cadastrar Plano</h2>
    
    <form action="add.php" method="POST"  align='middle'>
        <label for="codigo" class="cadastrofunc">Código do Plano:</label>
        <input type="text" id="codigo" name="codigo" placeholder="Código do Plano" /> <br/><br/>
        
        <label for="valorplano" class="cadastrofunc">Valor do Plano:</label>
        <input type="text" id="valorplano" name="valorplano" placeholder="Valor do Plano"/> <br/><br/>
        
        <label for="data" class="cadastrofunc">Data:</label>
        <input type="date" id="data" name="data" placeholder="Data" readonly="true" value="<?php echo  date('Y-m-d');?>" /> <br/><br/>
        
       <label for="salvar" class="cadastrofunc"></label>
        <button id="salvar" >Salvar</button>
        <button id="salvar" formaction="index.php">Voltar</button>
    </form>
</body>
</center>
</html>
