<?php
    require_once '../Model/init.php';
    require_once '../Classes/Modalidade.class.php';
    
    		            
        $cdModalidade="";
        $nomemodalidade="";
        $qtAulaSemanal="";
        $nomeProfessor="";
        $qtHorasAula="";
        $idProfessor = "";
        
    //recupera o id da URL
    $cdModalidade = isset($_GET['cd_modalidade']) ? $_GET['cd_modalidade'] : null;
    
    $exluir = new Modalidade($cdModalidade, $nomemodalidade, $qtAulaSemanal, $idProfessor, $nomeProfessor, $qtHorasAula);
    $exluir->ExcluirModalidade($cdModalidade, $nomemodalidade, $qtAulaSemanal, $idProfessor, $nomeProfessor, $qtHorasAula);