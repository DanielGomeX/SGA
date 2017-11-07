 <?php
    //recupera o ID da URL
    $cdplano = isset($_GET['cdplano'])? (int) $_GET['cdplano']: null;
       
    //valida o ID
    if(empty($cdplano)){
        echo '</br><font color="red">ID para alteração não definido</font>';
        echo '<a href="../Views/plano.php"> Voltar</a>';
        exit;
    }
    
    //recupera os dados do usuário a ser editado
    $PDO = db_connect();
    $sql = "SELECT tipo_plano,
            forma_pagamento
            FROM plano
            WHERE cd_plano = '$cdplano'";
    
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':cdplano', $cdplano, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // se o método fetch() não retornar um array, significa
    // que o ID não corresponde a um usuário válido.
    if(!is_array($user)){
        echo '</br><font color="red">Nenhum plano encontrado</font>';
        echo '<a href="../Views/plano.php"> Voltar</a>';
        exit;
    }
?>