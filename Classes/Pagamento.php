<?php
require_once '../Model/init.php';

class Pagamento {
    public $nomealuno;
    public $valormensalidade;
    public $modalidade;
    public $mesreferente;
    public $datavencimento;
    
    function __construct($nomealuno, $valormensalidade, $modalidade, $mesreferente, $datavencimento) {
        $this->nomealuno = $nomealuno;
        $this->valormensalidade = $valormensalidade;
        $this->modalidade = $modalidade;
        $this->mesreferente = $mesreferente;
        $this->datavencimento = $datavencimento;
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
    
    function CadastrarPagamento($nomealuno, $valormensalidade, $modalidade, $mesreferente, $datavencimento){
        
    }
    
    function AlterarPagamento($nomealuno, $valormensalidade, $modalidade, $mesreferente, $datavencimento){
        
    }
    
    function ConsultarPagamento($nomealuno, $valormensalidade, $modalidade, $mesreferente, $datavencimento){
        
    }
    
    function ExcluirPagamento($nomealuno, $valormensalidade, $modalidade, $mesreferente, $datavencimento){
        
    }
}
