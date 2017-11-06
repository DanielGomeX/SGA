<?php
require_once '../Model/init.php';

class Plano {
    public $cdplano;
    public $tipoplano;
    public $formapagamento;
    public $modalidade;
    
    function __construct($cdplano,$tipoplano, $formapagamento, $modalidade) {
        $this->cdplano = $cdplano;
        $this->tipoplano = $tipoplano;
        $this->formapagamento = $formapagamento;
        $this->modalidade = $modalidade;
    }
    
    function getCdplano(){
        return $this->cdplano;
    }
    
    function getTipoplano() {
        return $this->tipoplano;
    }

    function getFormapagamento() {
        return $this->formapagamento;
    }

    function getModalidade() {
        return $this->modalidade;
    }
    
    function setCdplano($cdplano){
        $this->cdplano= $cdplano;
    }

    function setTipoplano($tipoplano) {
        $this->tipoplano = $tipoplano;
    }

    function setFormapagamento($formapagamento) {
        $this->formapagamento = $formapagamento;
    }

    function setModalidade($modalidade) {
        $this->modalidade = $modalidade;
    }

//----------------------------MÉTODOS---------------------------------------------
    
    function CadastrarPlano($cdplano,$tipoplano, $formapagamento, $modalidade) {
        
    //inserir no banco
    $PDO = db_connect();
    $sql = "INSERT INTO plano
            (cd_plano,
            tipo_plano,
            nm_modalidade,
            forma_pagamento)
            VALUES
            (:cd_plano,
            :tipo_plano,
            :nm_modalidade,
            :forma_pagamento);
            SELECT nm_modalidade
            FROM modalidade
            WHERE nm_modalidade = :nm_modalidade";
     
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':cd_plano', $cdplano);
    $stmt->bindParam(':tipo_plano', $tipoplano);
    $stmt->bindParam(':nm_modalidade',$modalidade);
    $stmt->bindParam(':forma_pagamento', $formapagamento);
    
    
        if($stmt->execute()){
            header('location: ../Views/plano.php');
        }else{
            echo '</br><font color="red">Ops! Erro ao cadastrar!</font>';
            print_r($stmt->errorInfo());
        }
    }
    
    function AlterarPlano($cdplano,$tipoplano, $formapagamento, $modalidade){
         //atualiza o banco de dados
        $PDO = db_connect();
        $sql = "UPDATE plano SET 
            tipo_plano = :tipo_plano,
            nm_modalidade = :nm_modalidade,
            forma_pagamento = :forma_pagamento
            WHERE cd_plano = :cd_plano";

        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':tipo_plano',$tipoplano);
        $stmt->bindParam(':nm_modalidade',$modalidade);
        $stmt->bindParam(':forma_pagamento',$formapagamento);
        $stmt->bindParam(':cd_plano',$cd_plano, PDO::PARAM_INT);

        if($stmt->execute()){
            header('location: ../Views/plano.php');
        }else{
            echo '</br><font color="red">Erro ao alterar!</font>';
            print_r($stmt->errorInfo());
        }
    
    }
    
    function ConsultarPlano($cdplano,$tipoplano, $formapagamento, $modalidade) {
        
            $nome = $_POST['cxnome'];
            $pesquisa = $_POST['buscar'];
            
            $PDO = db_connect();
            if(isset($pesquisa)&&!empty($nome)){
            $stmt = $PDO->prepare("SELECT tipo_plano,
                                          nm_modalidade,
                                          forma_pagamento
                                            FROM plano
                                            WHERE tipo_plano
                                            LIKE :letra");
           
            $stmt->bindValue(':letra', '%'.$nome.'%', PDO::PARAM_STR);
            $stmt->execute();
            $resultados = $stmt->rowCount();

            if($resultados>=1){
                echo "Resultado(s) encontrado(s): ".$resultados."<br /><br />";
                echo "<table class='table table-hover'>";
                 echo'<thead>';
                  echo'<tr>';
                      echo '<th>Tipo do Plano:</th>';
                      echo '<th>Forma de Pagamento:</th>';
                      echo '<th>Modalidade:</th>';
                  echo '</tr>';
              echo '</thead>';
              echo '<tbody>';
                while($reg = $stmt->fetch(PDO::FETCH_OBJ)){
              echo '<tr>';
                echo '<td>'.$reg->tipo_plano.'</td>';
                echo '<td>'.$reg->nm_modalidade.'</td>';
                echo '<td>'.$reg->forma_pagamento.'</td>';
                 echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';

                echo "<a href='../Views/plano.php')><button class='btn btn-primary' >Voltar</button></a> ";
                }else{
                    echo "Não existe Modalidade cadastrada";
                    echo "</br><a href='../Views/plano.php')><button class='btn btn-primary'>Voltar</button></a> ";
                }
                }
                else{
                    echo "Preencha o campo de pesquisa";
                    echo "</br><a href='../Views/plano.php')><button class='btn btn-primary' >Voltar</button></a> ";
                }
    }
    
    function ExcluirPlano($cdplano,$tipoplano, $formapagamento, $modalidade) {
        if(empty($cdplano)){
                echo '</br><font color="red">ID não informado</font>';
                exit;
            }
        //remove do banco
        $PDO = db_connect();
        $sql = "DELETE FROM plano WHERE cd_plano = :id";
        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':id', $cd_plano, PDO::PARAM_INT);
        $stmt->execute();
        header('Location: ../Views/plano.php');
    }
}