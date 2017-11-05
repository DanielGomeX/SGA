<?php
    require_once '../Model/init.php';
    require_once '../Classes/Modalidade.class.php';
    
    //recupera os valores do formulário
    $nomeProfessor = isset($_POST['nomeprofessor'] )? $_POST['nomeprofessor']: null;
    $idProfessor = isset($_POST['idProfessor'] )? $_POST['idProfessor']: null;
    $nomemodalidade = isset($_POST['nomemodalidade'] )? $_POST['nomemodalidade']: null;
    $qtAulaSemanal = isset($_POST['qtaulassemana'] )? $_POST['qtaulassemana']: null;
    $qtHorasAula = isset($_POST['qthorasaula'] )? $_POST['qthorasaula']: null;
    $cdModalidade = isset($_POST['cd_modalidade']) ? $_POST['cd_modalidade'] : null;
    
    $alterar = new Modalidade($cdModalidade, $nomemodalidade, $qtAulaSemanal, $idProfessor, $nomeProfessor, $qtHorasAula);
    $alterar->AlterarModalidade($cdModalidade, $nomemodalidade, $qtAulaSemanal, $idProfessor, $nomeProfessor, $qtHorasAula);
?>