<?php
    require_once '../Model/init.php';
    require_once '../Classes/Modalidade.class.php';
    
    		            
        $cdModalidade="";
        $nomemodalidade="";
        $qtAulaSemanal="";
        $qtHorasAula="";
        $professor = "";
        
    //recupera o id da URL
    $cdModalidade = isset($_GET['cd_modalidade']) ? $_GET['cd_modalidade'] : null;
    
    $exluir = new Modalidade($cdModalidade,$nomemodalidade,$qtAulaSemanal,$qtHorasAula,$professor);
    $exluir->ExcluirModalidade($cdModalidade,$nomemodalidade,$qtAulaSemanal,$qtHorasAula,$professor);