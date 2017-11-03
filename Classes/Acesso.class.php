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
	    
	    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
	    
	    if(count($users)<=0){
	    	$msg = "Usuário Não encontrado!";
	    }
    	//recupera o primeiro usuario
	    $user=$users[0];
	    
	    //a partir daqui ele verifica o nivel de privilégio de cada um
	    if($user['status'] == 1){	        
	        session_start();
	        $_SESSION['logged_in'] = true;
	        $_SESSION['user_id'] = $user['id'];
	        $_SESSION['user_status'] = $user['status'];
                $_SESSION['user_name'] = $user['usuario'];
	    }elseif ($user['status'] == 2) {
	        session_start();
	        $_SESSION['logged_in'] = true;
	        $_SESSION['user_id'] = $user['id'];
	        $_SESSION['user_status'] = $user['status'];
	    }else{
	        session_start();
	        $_SESSION['logged_in'] = true;
	        $_SESSION['user_id'] = $user['id'];
	        $_SESSION['user_status'] = $user['status'];
	    }
	    
	    header('location: ../Views/painel.php');
    
	    
	}
}