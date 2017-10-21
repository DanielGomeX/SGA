<?php
session_start();
 
require '../Model/init.php';
require 'check.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/style.css" rel="stylesheet" type="text/css" />
        <link href="../css/barramenu.css" rel="stylesheet" type="text/css" />
        <title>SGA</title>
    </head>
    <body>
    <center>
        <h1>SISTEMA DE GERENCIAMENTO DE ACADEMIA</h1>
        <div id="menu">
            <ul>
                <li><a href="../Professor/index.php">PROFESSORES</a></li>
                <li><a href="../Aluno/index.php">ALUNOS</a></li>
                <li><a href="../Modalidades/index.php">MODALIDADES</a></li>
                <li><a href="../Plano/index.php">PLANOS</a></li>
                <li><a href="sair.php">SAIR</a></li>
                <li><a><?php echo dataatual()?></a></li>
            </ul>
        </div>
        <?php if (isLoggedIn()): ?>
        <h3>Olá, <?php echo $_SESSION['user_status']; ?> . Seja Bem Vindo</h3>
        <?php else: ?>
        <p>Olá, visitante. <a href="../index.php">Login</a></p>
        <?php endif; ?>
    </center>
    </body>
</html>