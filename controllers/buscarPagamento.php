<?php
    //recupera o ID da URL
    $cd_pagamento = isset($_GET['cd_pagamento'])? (int) $_GET['cd_pagamento']: null;
       
    //valida o ID
    if(empty($cd_pagamento)){
        echo '</br><font color="red">ID para alteração não definido</font>';
        echo '<a href="../Views/pagamaento.php"> Voltar</a>';
        exit;
    }
    
    //recupera os dados do usuário a ser editado
    $PDO = db_connect();
    $sql = "SELECT 
            vl_mensalidade,
            dt_vencimento,
            mes_referente
            FROM pagamento
            WHERE cd_pagamento = '$cd_pagamento'";
    
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':cd_pagamento', $cd_pagamento, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // se o método fetch() não retornar um array, significa
    // que o ID não corresponde a um usuário válido.
    if(!is_array($user)){
        echo '</br><font color="red">Nenhum Pagamento encontrado</font>';
        echo '<a href="../Views/pagamento.php"> Voltar</a>';
        exit;
    }
?>