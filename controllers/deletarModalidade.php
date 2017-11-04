<?php
    require_once '../Model/init.php';
    require_once '../Classes/Modalidade.class.php';
    
    		            
        $cdModalidade="";
        $nomemodalidade="";
        $qtAulaSemanal="";
        $nomeProfessor="";
        $qtHorasAula="";
        
    //recupera o id da URL
    $cdModalidade = isset($_GET['id']) ? $_GET['id'] : null;
    
    $exluir = new Modalidade($cdModalidade,$nomemodalidade,$qtAulaSemanal,$nomeProfessor,$qtHorasAula);
    $exluir->ExcluirModalidade($cdModalidade,$nomemodalidade,$qtAulaSemanal,$nomeProfessor,$qtHorasAula);

