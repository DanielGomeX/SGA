<?php 
require_once '../Model/init.php';

class Professor{

	public $id;
	public $nome;
	public $rg;
	public $cpf;
	public $dtnasc;
	public $endereco;
	public $email;
	public $telefone;

	function __construct($id,$nome,$rg,$cpf,$dtnasc,$endereco,$email,$telefone){
		$this->id = $id;
		$this->nome = $nome;
		$this->rg = $rg;
		$this->cpf = $cpf;
		$this->dtnasc = $dtnasc;
		$this->endereco = $endereco;
		$this->email = $email;
		$this->telefone = $telefone;
	}

	function getId() {
        return $this->id;
    }
	 function getNome() {
        return $this->nome;
    }

    function getRg() {
        return $this->rg;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getDtnasc() {
        return $this->dtnasc;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setRg($rg) {
        $this->rg = $rg;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setDtnasc($dtnasc) {
        $this->dtnasc = $dtnasc;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

	public function cadastrar($nome,$rg,$cpf,$dtnasc,$endereco,$email,$telefone){
		$nome=ucwords(strtolower($nome));
		$endereco=ucwords(strtolower($endereco));

		//validacao de email
		$PDO = db_connect();
		$validar= $PDO->prepare("SELECT * FROM professor WHERE nm_email_professor = :email OR cpf_professor = :cpf");
		$validar->bindValue(':email', $email);
		$validar->bindValue(':cpf', $cpf);
		$validar->execute();
		$resultado= $validar->rowCount();

		if ($resultado == 0) {	
		//insercao no banco
	    $sql = "INSERT INTO professor(nm_professor, registro_geral_professor, cpf_professor, dt_nascimento_professor, nm_endereco,nm_email_professor, cd_telefone_professor)
            VALUES(:nome, :rg, :cpf, :dtnasc, :endereco, :email, :telefone)";

			$stmt = $PDO->prepare($sql);
			$stmt->bindParam(':nome' ,$nome);
			$stmt->bindParam(':rg' ,$rg);
			$stmt->bindParam(':cpf' ,$cpf);
			$stmt->bindParam(':dtnasc' ,$dtnasc);
			$stmt->bindParam(':endereco' ,$endereco);
			$stmt->bindParam(':email' ,$email);
			$stmt->bindParam(':telefone' ,$telefone);		
			$stmt->execute();
			header ('Location: ../Professor/index.php');

		}else{
			$msg="Desculpe, mas já existe um usuário com este email e/ou cpf em nosso sistema!";
		}
			if (isset($stmt)) {
				$msg="Cadastro realizado com sucesso!";
			}else{
				if (empty($msg)) {
					$msg="Ops!, Houve um erro em nosso sistema, contate o administrador!";
				}
				
			}
		echo $msg;
	}

	public function excluir($id){
		
	    //remove do banco
	    $PDO = db_connect();
	    $sql = "DELETE FROM professor WHERE id_professor = :id";
	    $stmt = $PDO->prepare($sql);
	    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
	    $stmt->execute();
	    header('Location: ../Professor/index.php');
	    
	}

	public function alterar(){

	}
}