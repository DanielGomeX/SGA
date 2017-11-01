<?php
if ($startaction==1 && $acao=="cadastrar"){
    //recupera dados do formulário
    $nome = isset($_POST['nome'] )? $_POST['nome']: null;
    $cpf = isset($_POST['cpf'] )? $_POST['cpf']: null;
    $rg = isset($_POST['rg'] )? $_POST['rg']: null;
    $endereco = isset($_POST['end'] )? $_POST['end']: null;
    $dtnasc = isset($_POST['dtnasc'] )? $_POST['dtnasc']: null;
    $telefone = isset($_POST['tel'] )? $_POST['tel']: null;
    $email = isset($_POST['email'] )? $_POST['email']: null;
    
    //validação(simples)
    if(empty($nome)|| empty($rg) || empty($cpf) || empty($dtnasc)||
        empty($endereco)||empty($email)|| empty($telefone)){
      
        echo '</br><font color="red">Volte e preencha os campos, por favor!</font>';
        echo '<a href="form-add.php">Voltar</a>';
        exit;
    }else{
        //Email valido
		if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
				//Executa a classe de cadastro
				$cadastro = new Aluno($id,$nome,$rg,$cpf,
                                  $datanascimento,$endereco,$telefone,$email);;
				$cadastro->CadastrarAluno($id,$nome,$rg,$cpf,
                                  $datanascimento,$endereco,$telefone,$email);
		}
		//Email invalido
		else{
			echo $msg="Digite seu Email corretamente!";
		}
    }
}