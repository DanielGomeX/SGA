<?php
    require_once '../Model/init.php';
    require_once '../Classes/Modalidade.class.php';
    $cdModalidade ="";
    $nomeProfessor ="";
    $qtAulaSemanal = "";
    $qtHorasAula = "";
    //recupera os valores do formulário
    $nomeProfessor = isset($_POST['nomeprofessor'] )? $_POST['nomeprofessor']: null;
    $nomemodalidade = isset($_POST['nomemodalidade'] )? $_POST['nomemodalidade']: null;
    $qtAulaSemanal = isset($_POST['qtaulassemana'] )? $_POST['qtaulassemana']: null;
    $qtHorasAula = isset($_POST['qthorasaula'] )? $_POST['qthorasaula']: null;
    
    $cadastrar = new Modalidade($cdModalidade, $nomemodalidade, $qtAulaSemanal, $nomeProfessor, $qtHorasAula);
    $cadastrar->CadastrarModalidade($cdModalidade, $nomemodalidade, $qtAulaSemanal, $nomeProfessor, $qtHorasAula);  