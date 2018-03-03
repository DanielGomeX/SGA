<?php
    require_once '../Model/init.php';
    require_once '../Classes/Modalidade.class.php';
    
    //recupera os valores do formulário
    $cdModalidade = isset($_GET['cd_modalidade']) ? $_GET['cd_modalidade'] : null;
    $nomemodalidade = isset($_POST['nomemodalidade'] )? $_POST['nomemodalidade']: null;
    $professor = isset($_POST['nomeprofessor'])? $_POST['nomeprofessor']: null;
    $qtAulaSemanal = isset($_POST['qtaulassemana'] )? $_POST['qtaulassemana']: null;
    $qtHorasAula = isset($_POST['qthorasaula'] )? $_POST['qthorasaula']: null;
    
    
    
    $alterar = new Modalidade($cdModalidade, $nomemodalidade, $qtAulaSemanal, $qtHorasAula,$professor);
    $alterar->AlterarModalidade($cdModalidade, $nomemodalidade, $qtAulaSemanal, $qtHorasAula, $professor);
?>