<?php

$servidor = "localhost";
$user = "root";
$senhaBD = "";
$BD = "id2832957_sgabd";

$conn = mysqli_connect($servidor, $user, $senhaBD) or die(mysqli_error());
mysqli_select_db($conn,$BD) or die(mysqli_error());

if(isset($_POST['nomeusuario']) && isset($_POST['senha'])){
    $usuario = $_POST['nomeusuario'];
    $senha = $_POST['senha'];
    
    $sql = "SELECT * FROM acesso WHERE usuario = '$usuario'"
            . " AND senha = '$senha'";
   $resultado = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($resultado);
    
    
    if($num == 1){
        while($percorrer = mysqli_fetch_array($resultado)){
            $adm = $percorrer['status'];
            $nome = $percorrer['usuario'];
            session_start();
            
            if($adm == 1){
                //echo 'Bem vindo, ADMINISTRADOR!!';
                $_SESSION['Adm'] = $nome;
                
            }else if($adm == 2){
                //echo 'Bem vindo, BALCONISTA!!';
                 $_SESSION['Balconista'] = $nome;
                 
            }else{
                //echo 'BEM VINDO, PROFESSOR!!!';
                $_SESSION['Professor'] = $nome;
            }
            
            echo '<script type="text/javascript">window.location = "redirect.php"
            </script>';
        }
    }else{
        echo'Usuário e/ou senha invalido(s)';
    }
}


?>