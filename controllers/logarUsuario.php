<?php
	include ('../Classes/Acesso.class.php');

		//recupera variaveis do formulario
		$usuario = isset($_POST['usuario']) ? $_POST['usuario']:'';
		$senha = isset($_POST['senha']) ? $_POST['senha']:'';
		
		if(empty($usuario) || empty($senha)){
    		echo $msg = "Preencha Todos os Campos!!";
			header('Location: ../index.php');
		}else{
			//Executa a classe de acesso
			$acessar = new Acesso($usuario,$senha);
			$acessar->logar($usuario,$senha);
		}

