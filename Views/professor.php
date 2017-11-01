<?php
session_start();
 
require '../Model/init.php';
//require '../controllers/check.php';
include ('header.php'); 
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


<h2 class="center">Lista de professores</h2>
          <h3 class="center">Total de Professores: <?php if(isset($total)){echo $total;} ?></h3>

          <?php if(isset($total) > 0):?>
          
          </br>
          <table class="table table-hover">
              <thead>
                  <tr>
                      <th>Nome</th>
                      <th>RG</th>
                      <th>CPF</th>
                      <th>Data de Nascimento:</th>
                      <th>Endereço</th>
                      <th>Email</th>
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
              <a href="profEdit.php?id=<?php echo $user['id_professor'] ?>">
                  <button class="btn btn-primary fa fa-edit"></button></a>
              <a href="../controllers/deletarProfessor.php?id=<?php echo $user['id_professor'] ?>" onclick="return confirm('Tem certeza que deseja remover?');">
                  <button class="btn btn-danger fa fa-times"></button></a>
                      </td>
                  </tr>
                  <?php endwhile;?>
              </tbody>
          </table>
        <?php else: ?>
 
        <p>Nenhum professor registrado</p>
 
        <?php endif; ?>
        </br>
       <a href="profAdd.php"><button class="btn btn-primary fa fa-plus-square-o"> Professor</button></a>
                       
        
<?php 
  include ('footer.php');
?>