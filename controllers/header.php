<?php 
	$acao="";
	$startaction="";
	$msg="";
	if (isset($_GET["acao"])) {
		$acao=$_GET["acao"];
		$startaction=1;
	}
	include ('../Model/init.php');
	include ('../Classes/Professor.class.php');
	include ('../Classes/Aluno.class.php');
	include ('../Classes/Acesso.class.php');
