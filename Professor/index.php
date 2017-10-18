<?php
    require_once '../Model/init.php';

    // abre a conexão
    $PDO = db_connect();
    
  // SQL para contar o total de registros
    $sql_count = "SELECT COUNT(*) AS total FROM professor";
    
  // SQL para selecionar os registros
    $sql = "SELECT * FROM professor ";
    
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
        <title>Cadastro Professor</title>
        <link href="../css/style.css" rel="stylesheet" type="text/css" />
    </head>
        <body>
        <center>
          <h1>Sistema de Gerenciamento de Academia</h1>
          
          <h2>Lista de professores</h2>
          <p>Total de Professores: <?php echo $total ?></p>

          <?php if($total > 0):?>

          <table border="1">
              <thead>
                  <tr>
                      <th>Nome:</th>
                      <th>RG:</th>
                      <th>CPF:</th>
                      <th>Data de Nascimento:</th>
                      <th>Endereço:</th>
                      <th>Email:</th>
                      <th>Telefone</th>
                      <th>Ações</th>
                  </tr>
              </thead>
              <tbody>
                  <?php while($user = $stmt->fetch(PDO::FETCH_ASSOC)):?>
                  <tr>
                    <td><?PHP echo $user['nm_professor'] ?></td>
                    <td><?PHP echo $user['registro_geral_professor'] ?></td>
                    <td><?PHP echo $user['cpf_professor'] ?></td>
                    <td><?PHP echo date("d/m/Y", strtotime($user['dt_nascimento_professor'])) ?></td>
                    <td><?PHP echo $user['nm_endereco'] ?></td>
                    <td><?PHP echo $user['nm_email_professor'] ?></td>
                    <td><?PHP echo $user['cd_telefone_professor'] ?></td>
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
 
        <p>Nenhum professor registrado</p>
 
        <?php endif; ?>
        </br>
       
       <a href="form-add.php"><button>Adicionar professor</button></a>
                       
        </center>
      </body>
</html>
