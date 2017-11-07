<?php 

require_once '../Model/init.php';

class Acesso{

	public $usuario;
	public $senha;

	function __construct($usuario,$senha){
		$this->usuario = $usuario;
		$this->senha = $senha;
	}

	function getUsuario() {
        return $this->usuario;
    }
	 function getSenha() {
        return $this->senha;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

	public function logar($usuario, $senha){
		//encriptando a senha
		$usuario = addslashes($usuario);
    	$senhahash = make_hash($senha);
		//-------------------    
	    $PDO = db_connect();
		$sql = "SELECT id,usuario, status
                        FROM acesso
                        WHERE usuario = :usuario AND senha = :senha";
                
	    $stmt = $PDO->prepare($sql);
	    $stmt->bindParam(':usuario', $usuario);
	    $stmt->bindParam(':senha', $senhahash);
	    $stmt->execute();
	    
	    $users = $stmt->fetch(PDO::FETCH_ASSOC);
	    if($users==""){	    		    	
	    	$_SESSION['Error'] = "Usuário Não encontrado!";
	    	header('Location: ../index.php');
	    }

	    //a partir daqui ele verifica o nivel de privilégio de cada um
	    if($users['status'] == 1){	 
	        $_SESSION['logged_in'] = true;
	        $_SESSION['user_id'] = $users['id'];
            $_SESSION['user_name'] = $users['usuario'];
	        $_SESSION['user_status'] = $users['status'];
	        header('location: ../Views/painel.php');
	    }elseif ($users['status'] == 2) {
	        $_SESSION['logged_in'] = true;
	        $_SESSION['user_id'] = $users['id'];
	        $_SESSION['user_name'] = $users['usuario'];
	        $_SESSION['user_status'] = $users['status'];
	        header('location: ../Views/painelAtendente.php');
	    }elseif ($users['status'] == 3){
	        $_SESSION['logged_in'] = true;
	        $_SESSION['user_id'] = $users['id'];
	        $_SESSION['user_name'] = $users['usuario'];
	        $_SESSION['user_status'] = $users['status'];
	        header('location: ../Views/painelProfessor.php');
	    }
	}
}