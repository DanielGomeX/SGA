<?php
require_once '../Model/init.php';

class Pagamento {
    public $cdpagamento;
    public $nomealuno;
    public $modalidade;
    public $valormensalidade;
    public $mesreferente;
    public $datavencimento;
    
    function __construct($cdpagamento, $nomealuno, $modalidade, $valormensalidade, $mesreferente, $datavencimento) {
        $this->cdpagamento = $cdpagamento;
        $this->nomealuno = $nomealuno;
        $this->modalidade = $modalidade;
        $this->valormensalidade = $valormensalidade;
        $this->mesreferente = $mesreferente;
        $this->datavencimento = $datavencimento;
    }

    function getCdpagamento() {
        return $this->cdpagamento;
    }

    function getNomealuno() {
        return $this->nomealuno;
    }

    function getModalidade() {
        return $this->modalidade;
    }

    function getValormensalidade() {
        return $this->valormensalidade;
    }

    function getMesreferente() {
        return $this->mesreferente;
    }

    function getDatavencimento() {
        return $this->datavencimento;
    }

    function setCdpagamento($cdpagamento) {
        $this->cdpagamento = $cdpagamento;
    }

    function setNomealuno($nomealuno) {
        $this->nomealuno = $nomealuno;
    }

    function setModalidade($modalidade) {
        $this->modalidade = $modalidade;
    }

    function setValormensalidade($valormensalidade) {
        $this->valormensalidade = $valormensalidade;
    }

    function setMesreferente($mesreferente) {
        $this->mesreferente = $mesreferente;
    }

    function setDatavencimento($datavencimento) {
        $this->datavencimento = $datavencimento;
    }



//----------------------------MÉTODOS---------------------------------------------
    function CadastrarPagamento($cdpagamento, $nomealuno, $modalidade, $valormensalidade, $mesreferente, $datavencimento) {
        
    //inserir no banco
    $PDO = db_connect();
    $sql = "INSERT INTO pagamento
            (nm_aluno,
            nm_modalidade,
            vl_mensalidade,
            dt_vencimento,
            mes_referente)
            VALUES
           (:nm_aluno,
            :nm_modalidade,
            :vl_mensalidade,
            :dt_vencimento,
            :mes_referente)";
     
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nm_aluno',$nomealuno);
    $stmt->bindParam(':nm_modalidade',$modalidade);
    $stmt->bindParam(':vl_mensalidade',$valormensalidade);
    $stmt->bindParam(':dt_vencimento', $datavencimento);
    $stmt->bindParam(':mes_referente',$mesreferente);
    
        if($stmt->execute()){
            header('location: ../Views/pagamento.php');
        }else{
            echo $_SESSION['Error']="Ops! Erro ao cadastrar";
            print_r($stmt->errorInfo());
        }
    }
    
    function AlterarPagamento($cdpagamento, $nomealuno, $modalidade, $valormensalidade, $mesreferente, $datavencimento) {
         //atualiza o banco de dados
        $PDO = db_connect();
        $sql = "UPDATE pagamento SET
            nm_aluno = :nm_aluno,
            nm_modalidade = :nm_modalidade,
            vl_mensalidade = :vl_mensalidade,
            dt_vencimento = :dt_vencimento,
            mes_referente = :mes_referente
            WHERE cd_pagamento = :cd_pagamento";

        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':nm_aluno',$nomealuno);
        $stmt->bindParam(':nm_modalidade',$modalidade);
        $stmt->bindParam(':vl_mensalidade',$valormensalidade);
        $stmt->bindParam(':dt_vencimento',$datavencimento);
        $stmt->bindParam(':mes_referente',$mesreferente);
        $stmt->bindParam(':cd_pagamento',$cdpagamento, PDO::PARAM_INT);

        if($stmt->execute()){
            header('location: ../Views/pagamento.php');
        }else{
            echo $_SESSION['Error']= "Erro ao alterar! </br>";
            print_r($stmt->errorInfo());
        }
    
    }
    
    function ConsultarPagamento($cdpagamento, $nomealuno, $modalidade, $valormensalidade, $mesreferente, $datavencimento) {
        
            $nome = $_POST['cxnome'];
            $pesquisa = $_POST['buscar'];
            
            $PDO = db_connect();
            if(isset($pesquisa)&&!empty($nome)){
            $stmt = $PDO->prepare("SELECT *
                                             FROM pagamento
                                             WHERE nm_aluno
                                             LIKE :letra ORDER BY nm_aluno ASC");
           
            $stmt->bindValue(':letra', $nome.'%', PDO::PARAM_STR);
            $stmt->execute();
            $resultados = $stmt->rowCount();

            if($resultados>=1){
                echo "Resultado(s) encontrado(s): ".$resultados."<br /><br />";
                echo "<table class='table table-hover'>";
                 echo'<thead>';
                  echo'<tr>';
                      echo '<th>Nome do Aluno:</th>';
                     /* echo '<th>Modalidade:</th>';
                      echo '<th>Valor da Mensalidade(em R$):</th>';
                      echo '<th>Mês Referente:</th>';
                      echo '<th>Data de Vencimento:</th>'; */
                  echo '</tr>';
              echo '</thead>';
              echo '<tbody>';
                while($reg = $stmt->fetch(PDO::FETCH_OBJ)){
              echo '<tr>';
                echo '<td>'.$reg->nm_aluno.'</td>';
                /*echo '<td>'.$reg->nm_modalidade.'</td>';
                echo '<td>'.$reg->vl_mensalidade.'</td>';
                echo '<td>'.$reg->mes_referente.'</td>';
                echo '<td>'.$reg->dt_vencimento.'</td>';*/
                 echo '<td> 
                           <a href="pagamentoPesq.php?cdpagamento='. $reg->cd_pagamento.'">
                          <button class="btn btn-primary fa fa-search"></button></a>
                          <a href="../controllers/deletarPagamento.php?cdpagamento='.$reg->cd_pagamento.'" onclick="return confirm("Tem certeza que deseja remover?");">
                          <button class="btn btn-danger fa fa-times"></button></a>
                          </td>';
                 echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';

                echo "<a href='../Views/pagamento.php')><button class='btn btn-primary' >Voltar</button></a> ";
                }else{
                    echo $_SESSION['Error']= "Não existe pagamento cadastrado";
                    echo "</br><a href='../Views/pagamento.php')><button class='btn btn-primary'>Voltar</button></a> ";
                }
                }
                else{
                    echo $_SESSION['Error']= "Preencha o campo de pesquisa";
                    echo "</br><a href='../Views/pagamento.php')><button class='btn btn-primary' >Voltar</button></a> ";
                }
    }
    
    function ExcluirPagamento($cdpagamento, $nomealuno, $modalidade, $valormensalidade, $mesreferente, $datavencimento) {
        if(empty($cdpagamento)){
                   echo $_SESSION['Error']="ID não informado";
                   //exit;
               }
           //remove do banco
           $PDO = db_connect();
           $sql = "DELETE FROM pagamento WHERE cd_pagamento = :cdpagamento";
           $stmt = $PDO->prepare($sql);
           $stmt->bindParam(':cdpagamento', $cdpagamento, PDO::PARAM_INT);
           $stmt->execute();
           header('Location: ../Views/pagamento.php');
       }   

  }
