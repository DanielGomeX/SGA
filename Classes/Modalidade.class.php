<?php
require_once '../Model/init.php';

class Modalidade {
    public $cdModalidade;
    public $nome;
    public $qtAulaSemanal;
    public $nomeProfessor;
    public $qtHorasAula;
    
    function __construct($cdModalidade,$nome,$qtAulaSemanal,$nomeProfessor,$qtHorasAula) {
        $this->cdModalidade = $cdModalidade;
        $this->nome = $nome;
        $this->nomeProfessor = $nomeProfessor;
        $this->qtAulaSemanal = $qtAulaSemanal;
        $this->qtHorasAula = $qtHorasAula;
    }
    
    function getCdModalidade() {
        return $this->cdModalidade;
    }

    function getNome() {
        return $this->nome;
    }

    function getQtAulaSemanal() {
        return $this->qtAulaSemanal;
    }

    function getNomeProfessor() {
        return $this->nomeProfessor;
    }

    function getQtHorasAula() {
        return $this->qtHorasAula;
    }

    function setCdModalidade($cdModalidade) {
        $this->cdModalidade = $cdModalidade;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setQtAulaSemanal($qtAulaSemanal) {
        $this->qtAulaSemanal = $qtAulaSemanal;
    }

    function setNomeProfessor($nomeProfessor) {
        $this->nomeProfessor = $nomeProfessor;
    }

    function setQtHorasAula($qtHorasAula) {
        $this->qtHorasAula = $qtHorasAula;
    }

//----------------------------MÉTODOS---------------------------------------------
    public function CadastrarModalidade($cdModalidade,$nome,$qtAulaSemanal,$nomeProfessor,$qtHorasAula){
  
        //inserir no banco
        $PDO = db_connect();
        $sql = "INSERT INTO modalidade
                (nm_professor,nm_modalidade,
                qt_aulasem,qt_hraula)
                FROM professor pf en
                INNER JOIN modalidade as mo ON
                (pf.modalidade = mo.modalidade)";
        
        $stmt = $PDO->prepare($sql);
        $stmt = $PDO->bindParam(':nomeprofessor',$nomeProfessor);
        $stmt = $PDO->bindParam(':nomemodalidade',$nome);
        $stmt = $PDO->bindParam(':qtdaulasemanal',$qtAulaSemanal);
        $stmt = $PDO->bindParam(':qtdhoraaula',$qtHorasAula);

        if($stmt->execute()){
            header('location: index.php');
        }else{
            echo '</br><font color="red">Ops! Erro ao cadastrar!</font>';
            echo '</br><a href="form-add.php">Voltar</a>';
            print_r($stmt->errorInfo());
        }
    }
    
    public function AlterarModalidade(){
        
    }
    
    public function ConsultarModalidade(){
        
    }
    
    public function ExcluirModalidade(){
        
    }
}
