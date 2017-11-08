<?php
require_once '../Model/init.php';

class Modalidade {
    public $cdModalidade;
    public $nomemodalidade;
    public $qtAulaSemanal;
    public $qtHorasAula;
    
    function __construct($cdModalidade,$nomemodalidade,$qtAulaSemanal,$qtHorasAula) {
        $this->cdModalidade = $cdModalidade;
        $this->nomemodalidade = $nomemodalidade;
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

    function setQtHorasAula($qtHorasAula) {
        $this->qtHorasAula = $qtHorasAula;
    }

//----------------------------MÉTODOS---------------------------------------------
    public function CadastrarModalidade($cdModalidade,$nomemodalidade,$qtAulaSemanal,$qtHorasAula) {
  
        //inserir no banco
        $PDO = db_connect();
        $sql = "INSERT INTO modalidade
                (nm_modalidade,
                qt_aulasem,
                qt_hraula)
                VALUES
                (:nm_modalidade,
                :qt_aulasem,
                :qt_hraula)";
        
        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':nm_modalidade',$nomemodalidade);
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
    
    public function AlterarModalidade($cdModalidade,$nomemodalidade,$qtAulaSemanal,$qtHorasAula) {
         //atualiza o banco de dados
        $PDO = db_connect();
        $sql = "UPDATE modalidade SET 
            nm_modalidade = :nm_modalidade,
            qt_aulasem = :qt_aulasem,
            qt_hraula = :qt_hraula
            WHERE cd_modalidade = :cd_modalidade";

        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':nm_modalidade',$nomemodalidade);
        $stmt->bindParam(':qt_aulasem',$qtAulaSemanal);
        $stmt->bindParam(':qt_hraula',$qtHorasAula);
        $stmt->bindParam(':cd_modalidade',$cdModalidade, PDO::PARAM_INT);

        if($stmt->execute()){
            header('location: ../Views/modalidade.php');
        }else{
            echo '</br><font color="red">Erro ao alterar!</font>';
            print_r($stmt->errorInfo());
        }
    }
    
    public function ConsultarModalidade($cdModalidade,$nomemodalidade,$qtAulaSemanal,$qtHorasAula) {
        
            $nome = $_POST['cxnome'];
            $pesquisa = $_POST['buscar'];
            
            $PDO = db_connect();
            if(isset($pesquisa)&&!empty($nome)){
            $stmt = $PDO->prepare("SELECT nm_modalidade,
                                          cd_modalidade,
                                          qt_aulasem,
                                          qt_hraula
                                            FROM modalidade
                                            WHERE nm_modalidade
                                            LIKE :letra");
           
            $stmt->bindValue(':letra', $nome.'%', PDO::PARAM_STR);
            $stmt->execute();
            $resultados = $stmt->rowCount();

            if($resultados>=1){
                echo "Resultado(s) encontrado(s): ".$resultados."<br /><br />";
                echo "<table class='table table-hover'>";
                 echo'<thead>';
                  echo'<tr>';
                      echo '<th>Nome da Modalidade:</th>';
                      echo '<th>Quantidade de aulas por semana:</th>';
                      echo '<th>Quantidade de horas/aula:</th>';
                  echo '</tr>';
              echo '</thead>';
              echo '<tbody>';
                while($reg = $stmt->fetch(PDO::FETCH_OBJ)){
              echo '<tr>';
                echo '<td>'.$reg->nm_modalidade.'</td>';
                echo '<td>'.$reg->qt_aulasem.'</td>';
                echo '<td>'.$reg->qt_hraula.'</td>';
                echo '<td>
                        <a href="modalidadeEdit.php?cd_modalidade='. $reg->cd_modalidade.'">
                        <button class="btn btn-primary fa fa-edit"></button></a>
                        <a href="../controllers/deletarModalidade.php?cd_modalidade='.$reg->cd_modalidade.'" onclick="return confirm("Tem certeza que deseja remover?");">
                        <button class="btn btn-danger fa fa-times"></button></a>
                        </td>';
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
    
    public function ExcluirModalidade($cdModalidade,$nomemodalidade,$qtAulaSemanal,$qtHorasAula) {
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
