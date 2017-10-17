<?php
    require 'init.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulario de Cadastro</title>
     <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    
    <h1>Sistema de Gerenciamento de Academia</h1>
   
    <h2>Cadastrar Professor</h2>
    
    <form action="add.php" method="POST"  align='middle'>
        <label for="nome" class="cadastrofunc">Nome:</label>
        <input type="text" id="nome" name="nome" placeholder="Nome do professor" /> <br/><br/>
        
        <label for="rg" class="cadastrofunc">RG:</label>
        <input type="text" id="rg" name="rg" placeholder="RG"/> <br/><br/>
        
        <label for="cpf" class="cadastrofunc">CPF:</label>
        <input type="text" id="cpf" name="cpf" placeholder="CPF"/> <br/><br/>
        
        <label for="dtnasc" class="cadastrofunc">Data de Nascimento:</label>
        <input type="date" id="dtnasc" name="dtnasc"
               placeholder="Data de nascimento"/> <br/><br/>
        
        <label for="endereço" class="cadastrofunc">Endereço:</label>
        <input type="text" id="end" name="end" placeholder="Endereço"/> <br/><br/>
        
        <label for="email" class="cadastrofunc">Email:</label>
        <input type="text" id="email" name="email" placeholder="E-mail"/> <br/><br/>
        
        <label for="tel" class="cadastrofunc">Telefone:</label>
        <input type="text" id="tel" name="tel" placeholder="Telefone"/> <br/><br/>
        
        <label for="salvar" class="cadastrofunc"></label>
        <input type="submit" id="salvar" value="Salvar" /> 
        <input type="submit" name="voltar" value="Voltar" formaction="index.php" /> <br/>
    </form>
</body>
</html>
