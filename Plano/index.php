<?php
    require_once '../Model/init.php';

    // abre a conexão
    $PDO = db_connect();
    
    // SQL para contar o total de registros
    $sql_count = "SELECT COUNT(*) AS total FROM plano";
    
    // SQL para selecionar os registros
    $sql = "SELECT * FROM plano ";
    
    // conta o total de registros
    $stmt_count = $PDO->prepare($sql_count);
    $stmt_count->execute();
    $total = $stmt_count->fetchColumn();
    
    //Seleciona os registros
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro Plano</title>
        <link href="../css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <center>
        <body>
          <h1>Sistema de Gerenciamento de Academia</h1>
          
          <h2>Lista de Planos</h2>
          <p>Total de Planos: <?php echo $total ?></p>

          <?php if($total > 0):?>

          <table border="1">
              <thead>
                  <tr>
                      <th>Código:</th>
                      <th>Valor do Plano:</th>
                      <th>Data:</th>
                      <th>Ações</th>
                  </tr>
              </thead>
              <tbody>
                  <?php while($user = $stmt->fetch(PDO::FETCH_ASSOC)):?>
                  <tr>
                      <td><?PHP echo $user['cd_plano'] ?></td>
                      <td><?PHP echo $user['vl_plano'] ?></td>
                      <td><?PHP echo $user['dt_plano'] ?></td>
                      <td>
                      <a href="form-edit.php?codigo=<?php echo $user['cd_plano'] ?>">
                  <button>Editar</button></a>
              <a href="delete.php?codigo=<?php echo $user['cd_plano'] ?>"
                 onclick="return confirm('Tem certeza que deseja remover?');">
                  <button>Excluir</button></a>
                      </td>
                  </tr>
                  <?php endwhile;?>
              </tbody>
          </table>
        <?php else: ?>
 
        <p>Nenhum plano registrado</p>
 
        <?php endif; ?>
        
        </br></br>
        <div class="container">
            <a href="form-add.php"><button id="button">Adicionar Plano</button></a>
        </div>
      </body>
    </center>
</html>
