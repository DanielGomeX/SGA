<?php
    require_once '../Model/init.php';

    // abre a conexão
    $PDO = db_connect();
    
  // SQL para contar o total de registros
    $sql_count = "SELECT COUNT(*) AS total FROM modalidade";
    
  // SQL para selecionar os registros
    $sql = "SELECT * FROM modalidade";
    
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/style.css" rel="stylesheet" type="text/css" />
        <link href="../css/barramenu.css" rel="stylesheet" type="text/css" />
        <title>Cadastro Modalidade</title>
    </head>
        <body>
        <center>
          <h1>SISTEMA DE GERENCIAMENTO DE ACADEMIA</h1>
          <div id="menu">
            <ul>
                <li><a href="../Professor/index.php">PROFESSORES</a></li>
                <li><a href="../Aluno/index.php">ALUNOS</a></li>
                <li><a href="../Modalidades/index.php">MODALIDADES</a></li>
                <li><a href="../Plano/index.php">PLANOS</a></li>
                <li><a href="../Login/sair.php">SAIR</a></li>
                <li><a><?php echo dataatual()?></a></li>
            </ul>
        </div>
        </br>
          <h2>Lista de modalidades</h2>
          <h3>Total de modalidades: <?php echo $total ?></h3>

          <?php if($total > 0):?>

          <table border="1" style="background-color: #fff; border-radius: 4px;">
              <thead>
                  <tr>
                      <th>Nome do Professor: </th>
                      <th>Modalidade: </th>
                      <th>Qtd Aula Semanal: </th>
                      <th>Quantidade Hora Aula:</th>
                    </tr>
              </thead>
              <tbody>
                  <?php while($user = $stmt->fetch(PDO::FETCH_ASSOC)):?>
                  <tr>
                      <td><?PHP echo $user['nm_professor'] ?></td>
                      <td><?PHP echo $user['nm_modalidade'] ?></td>
                      <td><?PHP echo $user['qt_aulasem'] ?></td>
                      <td><?PHP echo $user['qt_hraula'] ?></td>
                      <td>
                            
              <a href="form-edit.php?id=<?php echo $user['id_professor'] ?>">
                  <button>Editar</button></a>
              <a href="delete.php?id=<?php echo $user['id_professor'] ?>"
                 onclick="return confirm('Tem certeza que deseja remover?');">
                  <button>Excluir</button></a>
                      </td>
                  </tr>
                  <?php endwhile;?>
              </tbody>
          </table>
        <?php else: ?>
 
        <p>Nenhum usuário registrado</p>
 
        <?php endif; ?>
        
        </br></br>
        <div class="container">
            <a href="form-add.php"><button id="button">Adicionar Modalidade</button></a>
        </div>
    </center>
        </body>
</html>
