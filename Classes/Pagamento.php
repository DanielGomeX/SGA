<?php
require_once '../Model/init.php';

class Pagamento {
    public $cdpagamento;
    public $nomealuno;
    public $valormensalidade;
    public $modalidade;
    public $mesreferente;
    public $datavencimento;
    
    function __construct($cdpagamento,$nomealuno, $valormensalidade, $modalidade, $mesreferente, $datavencimento) {
        $this->nomealuno = $nomealuno;
        $this->valormensalidade = $valormensalidade;
        $this->modalidade = $modalidade;
        $this->mesreferente = $mesreferente;
        $this->datavencimento = $datavencimento;
    }

    function getCdpagamento(){
        return $this->$cdpagamento;
    }    
    
    function getNomealuno() {
        return $this->nomealuno;
    }

    function getValormensalidade() {
        return $this->valormensalidade;
    }

    function getModalidade() {
        return $this->modalidade;
    }

    function getMesreferente() {
        return $this->mesreferente;
    }

    function getDatavencimento() {
        return $this->datavencimento;
    }
    
    function setCdpagamento($cdpagamento){
        $this->cdpagamento= $cdpagamento;
    }

    function setNomealuno($nomealuno) {
        $this->nomealuno = $nomealuno;
    }

    function setValormensalidade($valormensalidade) {
        $this->valormensalidade = $valormensalidade;
    }

    function setModalidade($modalidade) {
        $this->modalidade = $modalidade;
    }

    function setMesreferente($mesreferente) {
        $this->mesreferente = $mesreferente;
    }

    function setDatavencimento($datavencimento) {
        $this->datavencimento = $datavencimento;
    }

//----------------------------MÉTODOS---------------------------------------------
    
    function CadastrarPagamento($cdpagamento,$nomealuno, $valormensalidade, $modalidade, $mesreferente, $datavencimento) {
        
    }
    
    function AlterarPagamento($cdpagamento,$nomealuno, $valormensalidade, $modalidade, $mesreferente, $datavencimento) {
        
    }
    
    function ConsultarPagamento($cdpagamento,$nomealuno, $valormensalidade, $modalidade, $mesreferente, $datavencimento) {
        
    }
    
    function ExcluirPagamento($cdpagamento,$nomealuno, $valormensalidade, $modalidade, $mesreferente, $datavencimento) {
        
        if(empty($cdpagamento)){
                echo '</br><font color="red">ID não informado</font>';
                exit;
            }
        //remove do banco
        $PDO = db_connect();
        $sql = "DELETE FROM pagamento WHERE cd_modalidade = :id";
        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':id', $cdModalidade, PDO::PARAM_INT);
        $stmt->execute();
        header('Location: ../Views/pagamento.php');
    }
        
}
