<?php

    session_start();
    
    if(isset($_SESSION['Adm'])){
        echo 'Bem vindo ' .$_SESSION['Adm']. ' - ADMINISTRADOR';
        
    }else if(isset($_SESSION['Balconista'])){
        echo 'Bem vindo ' . $_SESSION['Balconista'] . ' - BALCONISTA';
        
    }else if(isset($_SESSION['Professor'])){
        echo 'Bem vindo ' . $_SESSION['Professor'] . ' - PROFESSOR';
        
    }else{
        echo '<script type="text/javascript">window.location = "index.php"</script>';
    }
?>
<html>
    <head>
        <title>Você está logado.</title>
    </head>
    <body>
        <a href="sair.php">Sair</a>
    </body>
</html>
