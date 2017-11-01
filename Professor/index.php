<?php
    require_once '../Model/init.php';
    // abre a conexão
    $PDO = db_connect();
    
  // SQL para contar o total de registros
    $sql_count = "SELECT COUNT(*) AS total FROM professor";
    
  // SQL para selecionar os registros
    $sql = "SELECT * FROM professor LIMIT 10";
    
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
         <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/style.css" rel="stylesheet" type="text/css" />
        <link href="../css/barramenu.css" rel="stylesheet" type="text/css" />
        <title>Cadastro Professor</title>
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
        
        <h2>Lista de professores</h2>
          <h3>Total de Professores: <?php echo $total ?></h3>

          <?php if($total > 0):?>
          
          <form name="frmBusca" method="post" action="busca.php">
                <input type="text" name="cxnome" id="cxnome" placeholder="Digite o nome"/>
                <button type="submit" name="buscar" value="Buscar">Buscar</button><a/>
               <button type="reset" value="limpar" name="limpar">Limpar</button></a>
            </form>
          </br>
          <table border="1" style="background-color: #fff; border-radius: 4px;">
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
       
        <a href="../Views/professor.php"><button>Adicionar professor</button></a>
                       
        </center>
      </body>
</html>