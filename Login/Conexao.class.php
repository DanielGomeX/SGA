<?php
//Criando a classe de conexão

class Conexao{
    //atributos da classe(privados '-')
    private $usuario;
    private $senha;
    private $BD;
    private $servidor;
    private static $pdo; //é estatico porque nao precisa ser instanciado
    
    //método construtor
    public function _construtor(){
        $this->servidor="localhost";
        $this->BD="id2832957_sgabd";
        $this->usuario="id2832957_sgmaster" ;
        $this->senha = "";
    }
   //metodo para conectar
    public function conectar(){
        try{
            if(is_null(self::$pdo)){
                self::$pdo = new PDO("mysql:host=".$this->servidor.";dbname="
                        .$this->banco, $this->usuario, $this->senha);
            }
            return self::$pdo;
            } catch (PDOException $ex) {
            echo 'ERRO: '.$ex->getMessage();
            }
        }
}
?>