<?php
    require_once '../Model/init.php';
    require_once '../Classes/Modalidade.class.php';
    
    $nomemodalidade = "";
    $nomeProfessor ="";
    $idProfessor = "";
    $qtAulaSemanal = "";
    $qtHorasAula = "";
    
    //recupera os valores do formulário
    $nomeProfessor = isset($_POST['nomeprofessor'] )? $_POST['nomeprofessor']: null;
    $idProfessor = isset($_POST['idprofessor'] )? $_POST['idprofessor']: null;
    $nomemodalidade = isset($_POST['nomemodalidade'] )? $_POST['nomemodalidade']: null;
    $qtAulaSemanal = isset($_POST['qtaulassemana'] )? $_POST['qtaulassemana']: null;
    $qtHorasAula = isset($_POST['qthorasaula'] )? $_POST['qthorasaula']: null;
    $cdModalidade = "";
    
    $cadastrar = new Modalidade($cdModalidade,$nomemodalidade,$qtAulaSemanal,$idProfessor,$nomeProfessor,$qtHorasAula);
    $cadastrar->CadastrarModalidade($cdModalidade,$nomemodalidade,$qtAulaSemanal,$idProfessor,$nomeProfessor,$qtHorasAula);  