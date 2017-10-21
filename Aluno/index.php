<?php
    require_once '../Model/init.php';

    // abre a conexão
    $PDO = db_connect();
    
  // SQL para contar o total de registros
    $sql_count = "SELECT COUNT(*) AS total FROM aluno";
    
  // SQL para selecionar os registros
    $sql = "SELECT * FROM aluno ";
    
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
        <title>Cadastro Aluno</title>
        
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
          <h2>Lista de Alunos</h2>
          <h3>Total de Alunos: <?php echo $total ?></h3>

          <?php if($total > 0):?>

          <table width="90%" border="1">
              <thead>
                  <tr>
                      <th>Nome:</th>
                      <th>CPF:</th>
                      <th>RG:</th>
                      <th>Endereço:</th>
                      <th>Data de Nascimento:</th>
                      <th>Telefone</th>
                      <th>Email:</th>
                      <th>Ações</th>
                  </tr>
              </thead>
              <tbody>
                <?php while($user = $stmt->fetch(PDO::FETCH_ASSOC)):?>
                 <tr>
                 <td><?PHP echo $user['nm_aluno'] ?></td>
                 <td><?PHP echo $user['cpf_aluno'] ?></td>
                 <td><?PHP echo $user['registro_geral_aluno'] ?></td>
                 <td><?PHP echo $user['nm_endereco'] ?></td>
                 <td><?PHP echo date("d/m/Y", strtotime($user['dt_nascimento_aluno'])) ?></td>
                 <td><?PHP echo $user['cd_telefone_aluno'] ?></td>
                 <td><?PHP echo $user['nm_email_aluno'] ?></td>
                 <td>
              <a href="form-edit.php?id=<?php echo $user['matricula_aluno'] ?>">
                  <button>Editar</button></a>
              <a href="delete.php?id=<?php echo $user['matricula_aluno'] ?>"
                 onclick="return confirm('Tem certeza que deseja remover?');">
                  <button>Excluir</button></a>
                 </td>
                  </tr>
                  <?php endwhile;?>
              </tbody>
          </table>
        <?php else: ?>
 
        <p>Nenhum aluno registrado</p>
 
        <?php endif; ?>
        
        </br></br>
        <div class="container">
            <a href="form-add.php"><button id="button">Adicionar Aluno</button></a>
        </div>
        
        </center>
      </body>
</html>
