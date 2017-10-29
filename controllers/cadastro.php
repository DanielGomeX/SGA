<?php
if ($startaction==1 && $acao=="cadastrar") {
	//recupera dados do formulário
    $nome = isset($_POST['nome'] )? $_POST['nome']: null;
    $rg = isset($_POST['rg'] )? $_POST['rg']: null;
    $cpf = isset($_POST['cpf'] )? $_POST['cpf']: null;
    $dtnasc = isset($_POST['dtnasc'] )? $_POST['dtnasc']: null;
    $endereco = isset($_POST['end'] )? $_POST['end']: null;
    $email = isset($_POST['email'] )? $_POST['email']: null;
    $telefone = isset($_POST['tel'] )? $_POST['tel']: null;

	if(empty($nome)|| empty($rg) || empty($cpf) || empty($dtnasc)||
        empty($endereco)||empty($email)|| empty($telefone)){
		$msg="Preencha todos os campos!";
	}
		//Todos os campos preenchido
	else{
		//Email valido
		if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
				//Executa a classe de cadastro
				$conectar = new Cadastro();
				$conectar->cadastrar($nome,$rg,$cpf,$dtnasc,$endereco,$email,$telefone);
		}
		//Email invalido
		else{
			$msg="Digite seu Email corretamente!";
		}
	}
}
?>
