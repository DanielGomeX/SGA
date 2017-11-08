<?php

    // abre a conexão
    $PDO = db_connect();

//------------PAGINAÇÃO------------
    // definir o numero de itens por pagina
    $itens_por_pagina = 10;

    // pegar a pagina atual
    $pagina = intval($_GET['pagina']);
    
    // SQL para selecionar os registros
    $sql = "SELECT * FROM plano ORDER BY tipo_plano ASC LIMIT  $pagina, $itens_por_pagina";
     //Seleciona os registros
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
    
    // SQL para contar o total de registros
    $sql_count = "SELECT COUNT(*) AS total FROM plano";
    
    // conta o total de registros
    $stmt_count = $PDO->prepare($sql_count);
    $stmt_count->execute();
    $total = $stmt_count->fetchColumn();
    
    
   
    
    // definir numero de páginas
    $num_paginas = ceil($total/$itens_por_pagina);

?>
