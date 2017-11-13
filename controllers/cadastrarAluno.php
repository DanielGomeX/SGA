<?php
    session_start();
    require_once ('../Classes/Professor.class.php');
    
   //recupera dados do formulário
    $nome = isset($_POST['nome'] )? $_POST['nome']: null;
    $cpf = isset($_POST['cpf'] )? $_POST['cpf']: null;
    $rg = isset($_POST['rg'] )? $_POST['rg']: null;
    $endereco = isset($_POST['end'] )? $_POST['end']: null;
    $datanascimento = isset($_POST['dtnasc'] )? $_POST['dtnasc']: null;
    $telefone = isset($_POST['tel'] )? $_POST['tel']: null;
    $email = isset($_POST['email'] )? $_POST['email']: null;
    $tipoplano = isset($_POST['tipoplano'] )? $_POST['tipoplano']: null;
    $modalidade = isset($_POST['moda'] )? $_POST['moda']: null;
    $id ="";
    
    //validação(simples)
    if(empty($nome)|| empty($rg) || empty($cpf) || empty($datanascimento)||
        empty($endereco)||empty($email)|| empty($telefone)){
      
        $_SESSION['Error']="Preencha todos os campos!";
    }else{
        //Email valido
		if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
				//Executa a classe de cadastro
				$cadastro = new Aluno($id, $nome, $rg, $cpf,
                                $datanascimento, $endereco, $telefone, $email,
                                $tipoplano, $modalidade);
				$cadastro->CadastrarAluno($id, $nome, $rg, $cpf,
                                $datanascimento, $endereco, $telefone, $email,
                                $tipoplano, $modalidade);
		}
		//Email invalido
		else{
			echo $_SESSION['Error']="Digite seu Email corretamente!";
		}
    }
