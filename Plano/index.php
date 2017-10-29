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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/style.css" rel="stylesheet" type="text/css" />
        <link href="../css/barramenu.css" rel="stylesheet" type="text/css" />
        <title>Cadastro Plano</title>
    </head>
    <center>
        <body>
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
          
          <h2>Lista de Planos</h2>
          <h3>Total de Planos: <?php echo $total ?></h3>

          <?php if($total > 0):?>
           <form name="frmBusca" method="post" action="busca.php">
                <input type="text" name="cxnome" id="cxnome" placeholder="Digite o código"/>
                <button type="submit" name="buscar" value="Buscar">Buscar</button><a/>
               <button type="reset" value="limpar" name="limpar">Limpar</button></a>
            </form>
          </br>
          <table border="1" style="background-color: #fff; border-radius: 4px;">
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
                      <td><?PHP echo date("d/m/Y", strtotime($user['dt_plano']))?></td>
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
