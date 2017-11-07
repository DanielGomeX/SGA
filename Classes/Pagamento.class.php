<?php
require_once '../Model/init.php';

class Pagamento {
    public $cdpagamento;
    public $mesreferente;
    public $datavencimento;
    public $valormensalidade;
            
    function __construct($cdpagamento, $mesreferente, $datavencimento,$valormensalidade) {
        $this->cdpagamento = $cdpagamento;
        $this->mesreferente = $mesreferente;
        $this->datavencimento = $datavencimento;
        $this->valormensalidade=$valormensalidade;
    }
    
    function getCdpagamento() {
        return $this->cdpagamento;
    }

    function getMesreferente() {
        return $this->mesreferente;
    }

    function getDatavencimento() {
        return $this->datavencimento;
    }
    
    function getValormensalidade() {
        return $this->valormensalidade;
    }

    function setCdpagamento($cdpagamento) {
        $this->cdpagamento = $cdpagamento;
    }

    function setMesreferente($mesreferente) {
        $this->mesreferente = $mesreferente;
    }

    function setDatavencimento($datavencimento) {
        $this->datavencimento = $datavencimento;
    }
    
    function setValormensalidade($valormensalidade) {
        $this->valormensalidade = $valormensalidade;
    }



//----------------------------MÉTODOS---------------------------------------------
    function CadastrarPagamento($cdpagamento, $mesreferente, $datavencimento,$valormensalidade) {
        
    //inserir no banco
    $PDO = db_connect();
    $sql = "INSERT INTO pagamento
            (cd_pagamento,
            vl_mensalidade,
            dt_vencimento,
            mes_referente)
            VALUES
            (:cd_pagamento,
            :vl_mensalidade,
            :dt_vencimento,
            :mes_referente)";
     
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':cd_pagamento', $cdpagamento);
    $stmt->bindParam(':vl_mensalidade',$valormensalidade);
    $stmt->bindParam(':dt_vencimento', $datavencimento);
    $stmt->bindParam(':mes_referente',$mesreferente);
    
    
        
        if($stmt->execute()){
            header('location: ../Views/pagamento.php');
        }else{
            echo '</br><font color="red">Ops! Erro ao cadastrar!</font>';
            print_r($stmt->errorInfo());
        }
    }
    
    function AlterarPagamento($cdpagamento, $mesreferente, $datavencimento,$valormensalidade) {
         //atualiza o banco de dados
        $PDO = db_connect();
        $sql = "UPDATE pagamento SET 
            vl_mensalidade = :vl_mensalidade,
            dt_vencimento = :dt_vencimento,
            mes_referente = :mes_referente
            WHERE cd_pagamento = :cd_pagamento";

        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':vl_mensalidade',$valormensalidade);
        $stmt->bindParam(':dt_vencimento',$datavencimento);
        $stmt->bindParam(':mes_referente',$mesreferente);
        $stmt->bindParam(':cd_pagamento',$cdpagamento, PDO::PARAM_INT);

        if($stmt->execute()){
            header('location: ../Views/pagamento.php');
        }else{
            echo '</br><font color="red">Erro ao alterar!</font>';
            print_r($stmt->errorInfo());
        }
    
    }
    
    function ConsultarPagamento($cdpagamento, $mesreferente, $datavencimento,$valormensalidade) {
        
    }
    
    function ExcluirPagamento($cdpagamento, $mesreferente, $datavencimento,$valormensalidade) {
        if(empty($cdpagamento)){
                   echo '</br><font color="red">ID não informado</font>';
                   exit;

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
