<?php

    // abre a conexão
    $PDO = db_connect();
    
    //------------------Paginação----------------------------------
	if (!isset($_GET['pg'])) {
		$pg = 1;
	} else {
		$pg = $_GET['pg'];
	}
	$total_reg = "10";
	$inicio = $pg -1; 
	$inicio = $inicio * $total_reg;
		
	$anterior = $pg -1; 
	$proximo = $pg +1;
	
    //-----------------Paginação----------------------------------
    
    $sql = "SELECT * FROM modalidade ORDER BY nm_modalidade ASC LIMIT $inicio, $total_reg";
     //Seleciona os registros
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
    
    // SQL para contar o total de registros
    $sql_count = "SELECT COUNT(*) AS total FROM modalidade";
    
    // conta o total de registros
    $stmt_count = $PDO->prepare($sql_count);
    $stmt_count->execute();
    $total = $stmt_count->fetchColumn();
