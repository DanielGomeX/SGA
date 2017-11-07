<?php
    session_start();

    $usuario = isset($_POST['usuario']) ? $_POST['usuario']:'';
    $senha = isset($_POST['senha']) ? $_POST['senha']:'';

    if(!empty($usuario) && !empty($senha)){
            //recupera variaveis do formulario
            include '../Classes/Acesso.class.php';
            //Executa a classe de acesso
            $acessar = new Acesso($usuario,$senha);
            $acessar->logar($usuario,$senha);
    }else{
            $_SESSION['Error'] = "Preencha Todos os Campos!!";
            header("Location: ../index.php");
    }
