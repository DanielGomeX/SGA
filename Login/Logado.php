<?php
session_start();
 
require '../Model/init.php';
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
                    Painel</a> | <a href="sair.php">Sair</a></p>
        <?php else: ?>
        <p>Olá, visitante. <a href="../index.php">Login</a></p>
        <?php endif; ?>
 
    </body>
</html>