<?php
	include '../Classes/Professor.class.php';
	if($startaction==1 && $acao==cadastrar){
	//recupera dados do formulário
    $nome = isset($_POST['nome']);
    $rg = isset($_POST['rg'] );
    $cpf = isset($_POST['cpf'] );
    $dtnasc = isset($_POST['dtnasc'] );
    $endereco = isset($_POST['end'] );
    $email = isset($_POST['email'] );
    $telefone = isset($_POST['tel'] );

	if(empty($nome)|| empty($rg) || empty($cpf) || empty($dtnasc)||
        empty($endereco)||empty($email)|| empty($telefone)){
		header('../Views/professor.php');
		$msg="Preencha todos os campos!";
	}
		//Todos os campos preenchido
	else{
		//Email valido
		if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
                    //Executa a classe de cadastro
                    $cadastro = new Professor($nome,$rg,$cpf,$dtnasc,$endereco,$email,$telefone);
                    $cadastro->CadastrarProfessor($nome,$rg,$cpf,$dtnasc,$endereco,$email,$telefone);
		}
		//Email invalido
		else{
			$msg="Digite seu Email corretamente!";
		}
	}
}
?>
