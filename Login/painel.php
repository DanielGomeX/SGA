<?php
    session_start();
    require_once 'inicializar.php';
    require 'check.php';
?>
<!DOCTYPE <html>
<head>
    <meta charset="UTF-8">
    <title>Painel</title>
</head>
<body>
    <h1>PAINEL DO USUÁRIO</h1>
    <p>Bem-vindo ao seu painel, <?php echo $_SESSION['user_status']; ?> |
        <a href="sair.php">Sair</a></p>
</body>
</html>
