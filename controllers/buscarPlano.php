 <?php
    //recupera o ID da URL
    $cdplano = isset($_GET['cdplano'])? (int) $_GET['cdplano']: null;
       
    //valida o ID
    if(empty($cdplano)){
        echo $_SESSION['Error']="ID para alteração não definido";
        echo '<a href="../Views/plano.php"> Voltar</a>';
        //exit;
    }
    
    //recupera os dados do usuário a ser editado
    $PDO = db_connect();
    $sql = "SELECT tipo_plano,
            forma_pagamento,
            nm_modalidade
            FROM plano
            WHERE cd_plano = '$cdplano'";
    
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':cdplano', $cdplano, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // se o método fetch() não retornar um array, significa
    // que o ID não corresponde a um usuário válido.
    if(!is_array($user)){
        echo $_SESSION['Error']="Nenhum plano encontrado";
        echo '<a href="../Views/plano.php"> Voltar</a>';
        //exit;
    }
?>