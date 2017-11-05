<?php
    //recupera o ID da URL
    $cd_modalidade = isset($_GET['cd_modalidade'])? (int) $_GET['cd_modalidade']: null;
       
    //valida o ID
    if(empty($cd_modalidade)){
        echo '</br><font color="red">ID para alteração não definido</font>';
        echo '<a href="../Views/modalidade.php"> Voltar</a>';
        exit;
    }
    
    //recupera os dados do usuário a ser editado
    $PDO = db_connect();
    $sql = "SELECT cd_modalidade,
            id_professor,
            nm_professor,
            nm_modalidade,
            qt_aulasem,
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
        echo '</br><font color="red">Nenhum Usuário encontrado</font>';
        echo '<a href="index.php"> Voltar</a>';
        exit;
    }
?>