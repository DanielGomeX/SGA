<?php
    class Usuario{
        private $conn;
        
        //construtor
        public function _construct(){
            $this->conn = new Conexao();
        }
        
        public function logarUsuario($dado){
            $usuario = $dado['nomeusuario'];
            $senha = sha1($dado['senha']);
            try{
                $consulta = $this->conn->Conectar()->prepare("SELECT 'usuario',"
                        . " 'senha' FROM 'acesso' WHERE 'usuario' = :usuario"
                        . "AND 'senha' = :senha;");
                $consulta->bindParam(":nomeusuario", $this->usuario, PDO::PARAM_STR);
                $consulta->bindParam(":senha", $this->senha, PDO::PARAM_STR);
                $consulta->execute();
                if($consulta->rowCount() == 0){
                    header('location: /index.php');
                }else{
                    session_start();
                    $result = $consulta->fetch();
                    $_SESSION['LOGADO'] = "sim";
                    $_SESSION['usu'] = $result['status'];
                    header('location: ../admin.php');
                }
            } catch (PDOException $ex) {
                return $ex->getMessage();
            }
        }
    }
?>