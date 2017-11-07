<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Acesso</title>
        <link href="dist/css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <form action="controllers/logarUsuario.php" method="POST">
	<div class="login">
            <div class="mensagem"><?php if(isset($_SESSION['Error'])){echo $_SESSION['Error'];
            unset($_SESSION['Error']);}?></div>
		<div class="login-screen">
			<div class="app-title">
				<h1>CT NINO SOARES</h1></div>
        <div class="login-form">
            <div class="control-group">
                <input type="text" class="login-field" name='usuario'
                    accept="" placeholder="Usuário" id="login-name">
        
	<label class="login-field-icon fui-user" for="login-name"></label>
	</div>

	<div class="control-group">
	<input type="password" class="login-field" name="senha"
               placeholder="Senha" id="login-pass">
        
	<label class="login-field-icon fui-lock" for="login-pass"></label>
	</div>

         <input class="btn btn-primary btn-large btn-block" type="submit"
                name="acessar" value="Acessar"/>
	
	</div>
		</div>
	</div>
    </form>
        <center>
            <img src="dist/img/logoct.png" height="200" width="200"iden
                 border="0">
        </center>
</body>
</html>




			