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
    
    
//----------------------------MÉTODOS---------------------------------------------
    public function CadastrarAluno($id,$nome,$rg,$cpf,$datanascimento,$endereco,$telefone,$email){
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
			header ('Location: ../Views/aluno.php');
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
    
    public function AlterarAluno($id,$nome,$rg,$cpf,$datanascimento,$endereco,$telefone,$email){
        
        //atualiza o banco de dados
        $PDO = db_connect();
        $sql = "UPDATE aluno SET 
            nm_aluno = :nome,
            cpf_aluno = :cpf,
            registro_geral_aluno = :rg,
            nm_endereco = :endereco,
            dt_nascimento_aluno = :dtnasc,
            cd_telefone_aluno = :telefone, 
            nm_email_aluno = :email
            WHERE matricula_aluno = :id";

        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':nome',$nome);
        $stmt->bindParam(':cpf',$cpf);
        $stmt->bindParam(':rg',$rg);
        $stmt->bindParam(':endereco',$endereco);
        $stmt->bindParam(':dtnasc',$datanascimento);
        $stmt->bindParam(':telefone',$telefone);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':id',$id, PDO::PARAM_INT);

        if($stmt->execute()){
            header('location: ../Views/aluno.php');
        }else{
            echo '</br><font color="red">Erro ao alterar!</font>';
            print_r($stmt->errorInfo());
        }
    }
    
    public function ConsultarAluno($id,$nome,$rg,$cpf,$datanascimento,$endereco,$telefone,$email){
            
            $nome = $_POST['cxnome'];
            $pesquisa = $_POST['buscar'];
            
            $PDO = db_connect();
            if(isset($pesquisa)&&!empty($nome)){
            $stmt = $PDO->prepare("SELECT * FROM aluno
                                            WHERE nm_aluno
                                            LIKE :letra");
           
            $stmt->bindValue(':letra', '%'.$nome.'%', PDO::PARAM_STR);
            $stmt->execute();
            $resultados = $stmt->rowCount();

            if($resultados>=1){
                echo "Resultado(s) encontrado(s): ".$resultados."<br /><br />";
                echo "<table class='table table-hover'>";
                 echo'<thead>';
                  echo'<tr>';
                      echo '<th>Nome:</th>';
                      echo '<th>CPF:</th>';
                      echo '<th>RG:</th>';
                      echo '<th>Endereço:</th>';
                      echo '<th>Data de Nascimento:</th>';
                      echo '<th>Telefone</th>';
                      echo '<th>Email:</th>';
                  echo '</tr>';
              echo '</thead>';
              echo '<tbody>';
                while($reg = $stmt->fetch(PDO::FETCH_OBJ)){
              echo '<tr>';
                echo '<td>'.$reg->nm_aluno.'</td>';
                echo '<td>'.$reg->cpf_aluno.'</td>';
                echo '<td>'.$reg->registro_geral_aluno.'</td>';
                echo '<td>'.$reg->nm_endereco.'</td>';
                echo '<td>'. date("d/m/Y", strtotime($reg->dt_nascimento_aluno)).'</td>';
                echo '<td>'.$reg->cd_telefone_aluno.'</td>';
                echo '<td>'.$reg->nm_email_aluno.'</td>';
                 echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';

                echo "<a href='../Views/aluno.php')><button class='btn btn-primary' >Voltar</button></a> ";
                }else{
                    echo "Não existe Aluno cadastrado";
                    echo "</br><a href='../Views/aluno.php')><button class='btn btn-primary'>Voltar</button></a> ";
                }
                }
                else{
                    echo "Preencha o campo de pesquisa";
                    echo "</br><a href='../Views/aluno.php')><button class='btn btn-primary' >Voltar</button></a> ";
                }
    }
    
    public function ExcluirAluno($id){
        
            if(empty($id)){
                echo '</br><font color="red">ID não informado</font>';
                exit;
            }
        //remove do banco
        $PDO = db_connect();
        $sql = "DELETE FROM aluno WHERE matricula_aluno = :id";
        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        header('Location: ../Views/aluno.php');
    }
}
