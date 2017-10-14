<?php
session_start();
 
require 'inicializar.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>SGA</title>
    </head>
    <body>
        <h1>SGA</h1>
        <?php if (isLoggedIn()): ?>
        <p>Olá, <?php echo $_SESSION['user_status']; ?>. <a href="painel.php">
                    Painel</a> | <a href="logout.php">Sair</a></p>
        <?php else: ?>
            <p>Olá, visitante. <a href="form-login.php">Login</a></p>
        <?php endif; ?>
 
    </body>
</html>