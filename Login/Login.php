<?php
//Incluindo arquivo de inicialização
require '../Model/init.php';
include '../controllers/header.php';

//recupera variaveis do formulario
$usuario = isset($_POST['usuario']) ? $_POST['usuario']:'';
$senha = isset ($_POST['senha']) ? $_POST['senha']:'';

if(empty($usuario) || empty($senha)){
    $msg = "Preencha Todos os Campos!!";
}
//encriptando a senha
    $senhahash = make_hash($senha);
//-------------------    
    $PDO = db_connect();
    
$sql = "SELECT id, status FROM acesso WHERE usuario = :usuario AND senha = :senha";
    $stmt = $PDO->prepare($sql);
    
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':senha', $senhahash);
    
    $stmt->execute();
    
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if(count($users)<=0){
        echo '</br><font color="red">Ops! Email ou senha incorretos!!!</font> ';
        echo '</br><a href="../index.php">Voltar</a></p>';
        exit;
    }
    //recupera o primeiro usuario
    $user=$users[0];
    
    //a partir daqui ele verifica o nivel de privilégio de cada um
    if($user['status'] == 1){
        
        session_start();
        $_SESSION['logged_in'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_status'] = $user['status'];
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
    
    header('location: Logado.php');
    ?>