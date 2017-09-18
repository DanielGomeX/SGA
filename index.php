<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1 align="middle">Seja Bem vindo</h1>
        
        <h3 align="middle">Selecione seu usuário</h3>
        
        <form align="middle" name="login" action="conexaoBD.php" method="POST">
            <strong><label>Usuário:</label></strong></br>
            Nome: <input type="text" name='nomeusuario'/>
            <select name="tipousuario">
                <option value="">Você é?</option>
                <option value="1">Administrador</option>
                <option value="2">Balconista</option>
                <option value="3">Professor</option>
            </select></br></br>
            Senha:  <input type="password" name="senha"/></br></br>
            
            <input type="submit" name="acessar" value="Acessar"/>
        </form>
    </body>
</html>
