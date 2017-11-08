<?php
require_once '../Model/init.php';

class Plano {
    public $cdplano;
    public $tipoplano;
    public $formapagamento;
    
    function __construct($cdplano,$tipoplano, $formapagamento) {
        $this->cdplano = $cdplano;
        $this->tipoplano = $tipoplano;
        $this->formapagamento = $formapagamento;
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

    function setCdplano($cdplano){
        $this->cdplano= $cdplano;
    }

    function setTipoplano($tipoplano) {
        $this->tipoplano = $tipoplano;
    }

    function setFormapagamento($formapagamento) {
        $this->formapagamento = $formapagamento;
    }

//----------------------------MÉTODOS---------------------------------------------
    
    function CadastrarPlano($cdplano,$tipoplano, $formapagamento) {
        
    //inserir no banco
    $PDO = db_connect();
    $sql = "INSERT INTO plano
            (cd_plano,
            tipo_plano,
            forma_pagamento)
            VALUES
            (:cd_plano,
            :tipo_plano,
            :forma_pagamento)";
     
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':cd_plano', $cdplano);
    $stmt->bindParam(':tipo_plano', $tipoplano);
    $stmt->bindParam(':forma_pagamento', $formapagamento);
    
    
        if($stmt->execute()){
            header('location: ../Views/plano.php');
        }else{
            echo $_SESSION['Error']="Ops! Erro ao cadastrar!";
            print_r($stmt->errorInfo());
        }
    }
    
    function AlterarPlano($cdplano,$tipoplano, $formapagamento) {
         //atualiza o banco de dados
        $PDO = db_connect();
        $sql = "UPDATE plano SET 
            tipo_plano = :tipo_plano,
            forma_pagamento = :forma_pagamento
            WHERE cd_plano = :cd_plano";

        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':tipo_plano',$tipoplano);
        $stmt->bindParam(':forma_pagamento',$formapagamento);
        $stmt->bindParam(':cd_plano',$cdplano, PDO::PARAM_INT);

        if($stmt->execute()){
            header('location: ../Views/plano.php');
        }else{
            echo $_SESSION['Error']="Erro ao alterar!";
            print_r($stmt->errorInfo());
        }
    
    }
    
    function ConsultarPlano($cdplano,$tipoplano, $formapagamento) {
        
            $nome = $_POST['cxnome'];
            $pesquisa = $_POST['buscar'];
            
            $PDO = db_connect();
            if(isset($pesquisa)&&!empty($nome)){
            $stmt = $PDO->prepare("SELECT tipo_plano,
                                          cd_plano,
                                          forma_pagamento
                                            FROM plano
                                            WHERE tipo_plano
                                            LIKE :letra ORDER BY tipo_plano ASC");
           
            $stmt->bindValue(':letra', $nome.'%', PDO::PARAM_STR);
            $stmt->execute();
            $resultados = $stmt->rowCount();

            if($resultados>=1){
                echo "Resultado(s) encontrado(s): ".$resultados."<br /><br />";
                echo "<table class='table table-hover'>";
                 echo'<thead>';
                  echo'<tr>';
                      echo '<th>Tipo do Plano:</th>';
                      echo '<th>Forma de Pagamento:</th>';
                  echo '</tr>';
              echo '</thead>';
              echo '<tbody>';
                while($reg = $stmt->fetch(PDO::FETCH_OBJ)){
              echo '<tr>';
                echo '<td>'.$reg->tipo_plano.'</td>';
                echo '<td>'.$reg->forma_pagamento.'</td>';
                echo '<td>
                  <a href="planoEdit.php?cdplano='. $reg->cd_plano.'"> 
                  <button class="btn btn-primary fa fa-edit"></button></a>
                  <a href="../controllers/deletarPlano.php?cdplano='.$reg->cd_plano.'" onclick="return confirm("Tem certeza que deseja remover?");">
                  <button class="btn btn-danger fa fa-times"></button></a>
                  </td>';                
                 echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';

                echo "<a href='../Views/plano.php')><button class='btn btn-primary' >Voltar</button></a> ";
                }else{
                    echo $_SESSION['Error']="Não existe Modalidade cadastrada";
                    echo "</br><a href='../Views/plano.php')><button class='btn btn-primary'>Voltar</button></a> ";
                }
                }
                else{
                    echo $_SESSION['Error']="Preencha o campo de pesquisa";
                    echo "</br><a href='../Views/plano.php')><button class='btn btn-primary' >Voltar</button></a> ";
                }
    }
    
    function ExcluirPlano($cdplano,$tipoplano, $formapagamento) {
        if(empty($cdplano)){
                echo $_SESSION['Error']="ID não informado";
                exit;
                
            }
        //remove do banco
        $PDO = db_connect();
        $sql = "DELETE FROM plano WHERE cd_plano = :cdplano";
        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':cdplano', $cdplano, PDO::PARAM_INT);
        $stmt->execute();
        header('Location: ../Views/plano.php');
    }
}