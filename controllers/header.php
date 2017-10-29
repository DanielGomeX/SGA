<?php 
	$acao="";
	$startaction="";
	$msg="";
	if (isset($_GET["acao"])) {
		$acao=$_GET["acao"];
		$startaction=1;
	}
	include ('../Model/init.php');
	include ('../Classes/Cadastro.class.php');
	include ('../controllers/cadastro.php');
