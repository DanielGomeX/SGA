<?php
    require_once '../Model/init.php';
    require_once '../Classes/Modalidade.class.php';
        
    //recupera os valores do formulário
    $nomemodalidade = isset($_POST['nomemodalidade'] )? $_POST['nomemodalidade']: null;
    $qtAulaSemanal = isset($_POST['qtaulassemana'] )? $_POST['qtaulassemana']: null;
    $qtHorasAula = isset($_POST['qthorasaula'] )? $_POST['qthorasaula']: null;
    $professor = isset($_POST['professor'] )? $_POST['professor']: null; 
    $cdModalidade = "";
    
    $cadastrar = new Modalidade($cdModalidade,$nomemodalidade,$qtAulaSemanal,$qtHorasAula,$professor);
    $cadastrar->CadastrarModalidade($cdModalidade,$nomemodalidade,$qtAulaSemanal,$qtHorasAula,$professor);