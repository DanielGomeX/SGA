<?php
	require_once '../controllers/header.php';
	//recupera dados do formulário
    $nome = isset($_POST['nome'] )? $_POST['nome']: null;
    $rg = isset($_POST['rg'] )? $_POST['rg']: null;
    $cpf = isset($_POST['cpf'] )? $_POST['cpf']: null;
    $dtnasc = isset($_POST['dtnasc'] )? $_POST['dtnasc']: null;
    $endereco = isset($_POST['end'] )? $_POST['end']: null;
    $email = isset($_POST['email'] )? $_POST['email']: null;
    $telefone = isset($_POST['tel'] )? $_POST['tel']: null;
    $modalidade = isset($_POST['moda'] )? $_POST['moda']: null;
    
	if(empty($nome)|| empty($rg) || empty($cpf) || empty($dtnasc)||
        empty($endereco)||empty($email)|| empty($telefone) || empty($modalidade)){
		$_SESSION['Error']="Preencha todos os campos!";
	}
		//Todos os campos preenchido
	else{
		//Email valido
		if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
                    //Executa a classe de cadastro
                    $cadastro = new Professor($id,$nome,$rg,$cpf,$dtnasc,$endereco,$email,$telefone,$modalidade);
                    $cadastro->CadastrarProfessor($id,$nome,$rg,$cpf,$dtnasc,$endereco,$email,$telefone,$modalidade);
		}
		//Email invalido
		else{
			$_SESSION['Error']="Digite seu Email corretamente!";
		}
	}
?>
