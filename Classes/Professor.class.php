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
        public $modalidade;
        
               function __construct($id,$nome,$rg,$cpf,$dtnasc,$endereco,$email,$telefone,$modalidade){
		$this->id = $id;
		$this->nome = $nome;
		$this->rg = $rg;
		$this->cpf = $cpf;
		$this->dtnasc = $dtnasc;
		$this->endereco = $endereco;
		$this->email = $email;
		$this->telefone = $telefone;
                $this->modalidade = $modalidade;
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
    function getModalidade() {
        return $this->modalidade;
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
    
    function setModalidade($modalidade) {
        $this->modalidade = $modalidade;
    }

	public function CadastrarProfessor($id,$nome,$rg,$cpf,$dtnasc,$endereco,$email,$telefone,$modalidade){
            $nome=ucwords(strtolower($nome));
        	$endereco=ucwords(strtolower($endereco));

            //validacao de email
            $PDO = db_connect();
            $validar= $PDO->prepare("SELECT * FROM professor
                                    WHERE nm_email_professor = :email
                                    OR
                                    cpf_professor = :cpf");
            $validar->bindValue(':email', $email);
            $validar->bindValue(':cpf', $cpf);
            $validar->execute();
            $resultado= $validar->rowCount();

            if ($resultado == 0) {	
            //insercao no banco
                $sql = "INSERT INTO professor
                        (nm_professor,
                        registro_geral_professor,
                        cpf_professor,
                        dt_nascimento_professor,
                        nm_endereco,
                        nm_email_professor,
                        cd_telefone_professor,
                        nm_modalidade)
                        VALUES
                        (:nome,
                        :rg,
                        :cpf,
                        :dtnasc,
                        :endereco,
                        :email,
                        :telefone,
                        :modalidade)";

		$stmt = $PDO->prepare($sql);
		$stmt->bindParam(':nome' ,$nome);
		$stmt->bindParam(':rg' ,$rg);
		$stmt->bindParam(':cpf' ,$cpf);
		$stmt->bindParam(':dtnasc' ,$dtnasc);
		$stmt->bindParam(':endereco' ,$endereco);
		$stmt->bindParam(':email' ,$email);
		$stmt->bindParam(':telefone' ,$telefone);		
		$stmt->bindParam(':modalidade' ,$modalidade);		
		$stmt->execute();
		header ('Location: ../Views/professor.php');
            }else{
		$_SESSION['Error']="Desculpe, mas já existe um usuário com este email e/ou cpf em nosso sistema!";
            }
		if (isset($stmt)) {
			$_SESSION['Error']="Cadastro realizado com sucesso!";
		}else{
                    if (empty($msg)) {
                	$_SESSION['Error']="Ops!, Houve um erro em nosso sistema, contate o administrador!";
                    }	
		}
                    echo $_SESSION['Error'];
	}
        
        
	public function AlterarProfessor($id,$nome,$rg,$cpf,$dtnasc,$endereco,$email,$telefone,$modalidade){

            //atualiza o banco de dados
            $PDO = db_connect();
            $sql = "UPDATE professor SET 
                nm_professor = :nome,
                cpf_professor = :cpf,
                registro_geral_professor = :rg,
                nm_endereco = :endereco,
                dt_nascimento_professor = :dtnasc,
                cd_telefone_professor = :telefone, 
                nm_email_professor = :email,
                nm_modalidade = :modalidade
                WHERE id_professor = :id";

            $stmt = $PDO->prepare($sql);
            $stmt->bindParam(':nome',$nome);
            $stmt->bindParam(':cpf',$cpf);
            $stmt->bindParam(':rg',$rg);
            $stmt->bindParam(':endereco',$endereco);
            $stmt->bindParam(':dtnasc',$dtnasc);
            $stmt->bindParam(':telefone',$telefone);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':modalidade', $modalidade);
            $stmt->bindParam(':id',$id, PDO::PARAM_INT);

            if($stmt->execute()){
                header('location: ../Views/professor.php');
            }else{
                echo $_SESSION['Error']="Erro ao alterar!";
                print_r($stmt->errorInfo());
            }
	}

        
        public function ConsultarProfessor($id,$nome,$rg,$cpf,$dtnasc,$endereco,$email,$telefone,$modalidade){
            
            $nome = $_POST['cxnome'];
            $pesquisa = $_POST['buscar'];
            
	    $PDO = db_connect();
	    if(isset($pesquisa)&&!empty($nome)){
	        $stmt = $PDO->prepare("SELECT * FROM professor
                                                WHERE nm_professor
	                                        LIKE :letra ORDER BY nm_professor ASC");
		           
	        $stmt->bindValue(':letra', $nome.'%', PDO::PARAM_STR);
	        $stmt->execute();
	        $resultados = $stmt->rowCount();

	        if($resultados>=1){
	            echo "Resultado(s) encontrado(s): ".$resultados."<br /><br />";
	            echo "<table class='table table-hover'>";
	            echo'<thead>';
	            echo'<tr>';
	            echo '<th>Nome</th>';
                    echo '<th>Ações</th>';
	            echo '</tr>';
	            echo '</thead>';
                    echo '<tbody>';
                while($reg = $stmt->fetch(PDO::FETCH_OBJ)){
                    echo '<tr>';
                    echo '<td>'.$reg->nm_professor.'</td>';
                    if($_SESSION['user_status'] == 1){                                  
                                echo '<td>
                                        <a href="profPesq.php?id='. $reg->id_professor.'">
                                        <button class="btn btn-primary fa fa-search"></button></a>
                                        <a href="../controllers/deletarAluno.php?id='.$reg->id_professor.'" onclick="return confirm("Tem certeza que deseja remover?");">
                                        <button class="btn btn-danger fa fa-times"></button></a>
                                        </td>';
                              }elseif($_SESSION['user_status'] == 2 OR $_SESSION['user_status'] == 3){
                                  echo '<td>
                                        <a href="alunoPesq.php?id='. $reg->matricula_aluno.'">
                                        <button class="btn btn-primary fa fa-search"></button></a>
                                        </td>';
                              }
	            echo '</tr>';
		       }
                    echo '</tbody>';
		    echo '</table>';
		    echo '</br>';
		    echo "<a href='../Views/professor.php')><button class='btn btn-primary'>Voltar</button></a> ";
                    }else{
                        echo $_SESSION['Error']= "Não existe usuario cadastrado";
                        echo "</br><a href='../Views/professor.php')><button class='btn btn-primary'>Voltar</button></a> ";
                    }
                    }
                    else{
                    echo  $_SESSION['Error']="Preencha o campo de pesquisa";
                    echo "</br><a href='../Views/professor.php')><button class='btn btn-primary'>Voltar</button></a> ";
                    }
                     }
        
	public function ExcluirProfessor($id){
	    //remove do banco
	    $PDO = db_connect();
	    $sql = "DELETE FROM professor WHERE id_professor = :id";
	    $stmt = $PDO->prepare($sql);
	    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
	    $stmt->execute();
	    header('Location: ../Views/professor.php');
	    
	}
}