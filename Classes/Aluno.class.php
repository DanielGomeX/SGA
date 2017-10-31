<?php
require_once '../Model/init.php';

    class Aluno{
        public $id;
        public $nome;
        public $rg;
        public $cpf;
        public $datanascimento;
        public $endereco;
        public $telefone;
        public $email;
    
    function __construct($id,$nome,$rg,$cpf,$datanascimento,$endereco,$telefone,$email) {
        $this->id = $id;
        $this->nome = $nome ;
        $this->rg = $rg;
        $this->cpf = $cpf;
        $this->datanascimento = $datanascimento;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
        $this->email = $email;
    }
    function getId(){
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

    function getDatanascimento() {
        return $this->datanascimento;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getEmail() {
        return $this->email;
    }
    
    function setId($id){
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

    function setDatanascimento($datanascimento) {
        $this->datanascimento = $datanascimento;
    }

    function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    public function Cadastrar($nome,$rg,$cpf,$datanascimento,$endereco,$telefone,$email){
		$nome=ucwords(strtolower($nome));
		$endereco=ucwords(strtolower($endereco));

		//validacao de email
		$PDO = db_connect();
		$validar= $PDO->prepare("SELECT * FROM aluno
                        WHERE nm_email_aluno = :email OR cpf_aluno = :cpf");
		$validar->bindValue(':email', $email);
		$validar->bindValue(':cpf', $cpf);
		$validar->execute();
		$resultado= $validar->rowCount();

		if ($resultado == 0) {	
		//insercao no banco
	    $sql = "INSERT INTO aluno(nm_aluno,
             registro_geral_aluno,
            cpf_aluno,
            dt_nascimento_aluno,
            nm_endereco,
            nm_email_aluno,
            cd_telefone_aluno)
            VALUES(
            :nome,
            :rg,
            :cpf,
            :dtnasc,
            :endereco,
            :email,
            :telefone)";
			$stmt = $PDO->prepare($sql);
			$stmt->bindParam(':nome' ,$nome);
			$stmt->bindParam(':rg' ,$rg);
			$stmt->bindParam(':cpf' ,$cpf);
			$stmt->bindParam(':dtnasc' ,$datanascimento);
			$stmt->bindParam(':endereco' ,$endereco);
			$stmt->bindParam(':email' ,$email);
			$stmt->bindParam(':telefone' ,$telefone);		
			$stmt->execute();
			header ('Location: ../Aluno/index.php');
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
    
    public function Alterar($nome,$rg,$cpf,$datanascimento,$endereco,$telefone,$email){
        
    }
    
    public function Consultar(){
        
    }
    
    public function Excluir($id){
        
            if(empty($id)){
                echo '</br><font color="red">ID não informado</font>';
                exit;
            }
        //remove do banco
        $PDO = db_connect();
        $sql = "DELETE FROM aluno WHERE id = :id";
        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
        if($stmt->execute()){
            header('location: index.php');
        }else{
            echo '</br><font color="red">Erro ao remover!</font>';
            print_r($stmt->errorInfo());
        }
    }
}
