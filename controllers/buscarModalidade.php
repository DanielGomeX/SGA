<?php
    //recupera o ID da URL
    $cd_modalidade = isset($_GET['cd_modalidade'])? (int) $_GET['cd_modalidade']: null;
       
    //valida o ID
    if(empty($cd_modalidade)){
        echo $_SESSION['Error']="ID para alteração não definido";
        echo '<a href="../Views/modalidade.php"> Voltar</a>';
        //exit;
    }
    
    //recupera os dados do usuário a ser editado
    $PDO = db_connect();
    $sql = "SELECT cd_modalidade,
            nm_modalidade,
            qt_aulasem,
            nm_professor,
            qt_hraula
            FROM modalidade
            WHERE cd_modalidade = '$cd_modalidade'";
    
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':cd_modalidade', $cd_modalidade, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // se o método fetch() não retornar um array, significa
    // que o ID não corresponde a um usuário válido.
    if(!is_array($user)){
        echo $_SESSION['Error']="Nenhum Usuário encontrado";
        echo '<a href="../Views/modalidade.php"> Voltar</a>';
        //exit;
    }
?>