<?php
    //recupera o ID da URL
    $cdpagamento = isset($_GET['cdpagamento'])? (int) $_GET['cdpagamento']: null;
       
    //valida o ID
    if(empty($cdpagamento)){
       echo $_SESSION['Error']= "ID para alteração não definido";
        echo '<a href="../Views/pagamento.php"> Voltar</a>';
        //exit;
    }
    
    //recupera os dados do usuário a ser editado
    $PDO = db_connect();
    $sql = "SELECT 
            vl_mensalidade,
            dt_vencimento,
            mes_referente
            FROM pagamento
            WHERE cd_pagamento = '$cdpagamento'";
    
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':cdpagamento', $cdpagamento, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // se o método fetch() não retornar um array, significa
    // que o ID não corresponde a um usuário válido.
    if(!is_array($user)){
      echo $_SESSION['Error'] = "Nenhum Pagamento encontrado";
      echo '<a href="../Views/pagamento.php"> Voltar</a>';
        //exit;
    }
?>