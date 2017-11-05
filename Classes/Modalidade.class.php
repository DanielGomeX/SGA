<?php
require_once '../Model/init.php';

class Modalidade {
    public $cdModalidade;
    public $nomemodalidade;
    public $qtAulaSemanal;
    public $idProfessor;
    public $nomeProfessor;
    public $qtHorasAula;
    
    function __construct($cdModalidade,$nomemodalidade,$qtAulaSemanal,$idProfessor,$nomeProfessor,$qtHorasAula) {
        $this->cdModalidade = $cdModalidade;
        $this->nomemodalidade = $nomemodalidade;
        $this->nomeProfessor = $nomeProfessor;
        $this->qtAulaSemanal = $qtAulaSemanal;
        $this->qtHorasAula = $qtHorasAula;
    }
    
    function getCdModalidade() {
        return $this->cdModalidade;
    }

    function getNomeModalidade() {
        return $this->nomemodalidade;
    }

    function getQtAulaSemanal() {
        return $this->qtAulaSemanal;
    }

    function getNomeProfessor() {
        return $this->nomeProfessor;
    }
    
    function getIdProfessor(){
        return $this->idProfessor;
    }

    function getQtHorasAula() {
        return $this->qtHorasAula;
    }

    function setCdModalidade($cdModalidade) {
        $this->cdModalidade = $cdModalidade;
    }

    function setNomeModalidade($nome) {
        $this->nomemodalidade = $nomemodalidade;
    }

    function setQtAulaSemanal($qtAulaSemanal) {
        $this->qtAulaSemanal = $qtAulaSemanal;
    }

    function setNomeProfessor($nomeProfessor) {
        $this->nomeProfessor = $nomeProfessor;
    }
    
    function setidProfessor($idProfessor){
        $this->idProfessor = $idProfessor;
    }

    function setQtHorasAula($qtHorasAula) {
        $this->qtHorasAula = $qtHorasAula;
    }

//----------------------------MÉTODOS---------------------------------------------
    public function CadastrarModalidade($cdModalidade,$nomemodalidade,$qtAulaSemanal,$idProfessor,$nomeProfessor,$qtHorasAula){
  
        //inserir no banco
        $PDO = db_connect();
        $sql = "INSERT INTO modalidade
                (nm_modalidade,
                nm_professor,
                id_professor,
                qt_aulasem,
                qt_hraula)
                VALUES
                (:nm_modalidade,
                :nm_professor,
                :id_professor,
                :qt_aulasem,
                :qt_hraula);
                SELECT nm_professor,id_professor
                FROM professor
                WHERE nm_professor = :nm_professor,
                      id_professor = :id_professor";
        
        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':nm_modalidade',$nomemodalidade);
        $stmt->bindParam(':id_professor',$idProfessor);
        $stmt->bindParam(':nm_professor',$nomeProfessor);
        $stmt->bindParam(':qt_aulasem',$qtAulaSemanal);
        $stmt->bindParam(':qt_hraula',$qtHorasAula);

        if($stmt->execute()){
            header('location: ../Views/modalidade.php');
        }else{
            echo '</br><font color="red">Ops! Erro ao cadastrar modalidade!</font>';
            echo '</br><a href="../Views/modalidadeAdd.php">Voltar</a> ';
            echo '<br>';
            print_r($stmt->errorInfo());
            
        }
    }
    
    public function AlterarModalidade($cdModalidade,$nomemodalidade,$qtAulaSemanal,$idProfessor,$nomeProfessor,$qtHorasAula){
         //atualiza o banco de dados
        $PDO = db_connect();
        $sql = "UPDATE modalidade SET 
            nm_modalidade = :nm_modalidade,
            qt_aulasem = :qt_aulasem,
            qt_hraula = :qt_hraula,
            nm_professor = :nm_professor,
            id_professor = :id_professor
            WHERE cd_modalidade = :cd_modalidade";

        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':nm_modalidade',$nomemodalidade);
        $stmt->bindParam(':qt_aulasem',$qtAulaSemanal);
        $stmt->bindParam(':qt_hraula',$qtHorasAula);
        $stmt->bindParam(':nm_professor',$nomeProfessor);
        $stmt->bindParam(':id_professor',$idProfessor);
        $stmt->bindParam(':cd_modalidade',$cdModalidade, PDO::PARAM_INT);

        if($stmt->execute()){
            header('location: ../Views/modalidade.php');
        }else{
            echo '</br><font color="red">Erro ao alterar!</font>';
            print_r($stmt->errorInfo());
        }
    }
    
    public function ConsultarModalidade($cdModalidade,$nomemodalidade,$qtAulaSemanal,$idProfessor,$nomeProfessor,$qtHorasAula){
        
            $nome = $_POST['cxnome'];
            $pesquisa = $_POST['buscar'];
            
            $PDO = db_connect();
            if(isset($pesquisa)&&!empty($nome)){
            $stmt = $PDO->prepare("SELECT * FROM modalidade
                                            WHERE nm_modalidade
                                            LIKE :letra");
           
            $stmt->bindValue(':letra', '%'.$nome.'%', PDO::PARAM_STR);
            $stmt->execute();
            $resultados = $stmt->rowCount();

            if($resultados>=1){
                echo "Resultado(s) encontrado(s): ".$resultados."<br /><br />";
                echo "<table class='table table-hover'>";
                 echo'<thead>';
                  echo'<tr>';
                      echo '<th>Nome do Professor:</th>';
                      echo '<th>Nome da Modalidade:</th>';
                      echo '<th>Quantidade de aulas por semana:</th>';
                      echo '<th>Quantidade de horas/aula:</th>';
                  echo '</tr>';
              echo '</thead>';
              echo '<tbody>';
                while($reg = $stmt->fetch(PDO::FETCH_OBJ)){
              echo '<tr>';
                echo '<td>'.$reg->nm_modalidade.'</td>';
                echo '<td>'.$reg->nm_professor.'</td>';
                echo '<td>'.$reg->qt_aulasem.'</td>';
                echo '<td>'.$reg->qt_hraula.'</td>';
                 echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';

                echo "<a href='../Views/modalidade.php')><button class='btn btn-primary' >Voltar</button></a> ";
                }else{
                    echo "Não existe Modalidade cadastrada";
                    echo "</br><a href='../Views/modalidade.php')><button class='btn btn-primary'>Voltar</button></a> ";
                }
                }
                else{
                    echo "Preencha o campo de pesquisa";
                    echo "</br><a href='../Views/modalidade.php')><button class='btn btn-primary' >Voltar</button></a> ";
                }
       
    }
    
    public function ExcluirModalidade($cdModalidade,$nomemodalidade,$qtAulaSemanal,$idProfessor,$nomeProfessor,$qtHorasAula){
        if(empty($cdModalidade)){
                echo '</br><font color="red">ID não informado</font>';
                exit;
            }
        //remove do banco
        $PDO = db_connect();
        $sql = "DELETE FROM modalidade WHERE cd_modalidade = :id";
        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':id', $cdModalidade, PDO::PARAM_INT);
        $stmt->execute();
        header('Location: ../Views/modalidade.php');
    }
        
     
}
