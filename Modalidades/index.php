<?php
    require_once 'init.php';

    // abre a conexão
    $PDO = db_connect();
    
  // SQL para contar o total de registros
    $sql_count = "SELECT COUNT(*) AS total FROM professor";
    
  // SQL para selecionar os registros
    $sql = "SELECT * FROM professor";
    
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
        <title>Cadastro Modalidade</title>
    </head>
        <body>
          <h1>Sistema de Gerenciamento de Academia</h1>
          <p><a href="form-add.php">Adicionar Modalidade</a></p>
          <h2>Lista de modalidades</h2>
          <p>Total de modalidades: <?php echo $total ?></p>

          <?php if($total > 0):?>

          <table width="50%" border="1">
              <thead>
                  <tr>
                      <th>Nome do Professor: </th>
                      <td>Modalidade: </td>
                      <td><select name="modalidade" id="nomemoda">
                            <option>Selecione...</option>
                            <option value="Muay Thai">Muay Thai</option>
                            <option value="Taekwondo">Taekwondo</option>
                            <option value="Jiu-Jitsu">Jiu-Jitsu</option>
                            <option value="MMA">MMA</option>
                          </select>
                         <span class="style1">     </span></td>
                      <td>Qtd Aula Semanal: </td>
                      <td><select name="qtaula" id="qtaula">
                            <option>Selecione...</option>
                            <option value="1">1 Aula</option>
                            <option value="2">2 Aulas</option>
                            <option value="3">3 Aulas</option>
                            <option value="4">4 Aulas</option>
                            <option value="5">5 Aulas</option>
                            <option value="6">6 Aulas</option>
                            <option value="7">7 Aulas</option>
                            <option value="8">8 Aulas</option>
                            <option value="9">9 Aulas</option>
                            <option value="10">10 Aulas</option>
                          </select>
                            <span class="style1">      </span></td>
                      <td>Quantidade Hora Aula:</td>
                      <td><select name="hraula" id="hraula">
                            <option>Selecione...</option>
                            <option value="1">1 Hora</option>
                            <option value="2">2 Horas</option>
                            <option value="3">3 Horas</option>
                          </select>
                         <span class="style1">      </span></td>
                  </tr>
              </thead>
              <tbody>
                  <?php while($user = $stmt->fetch(PDO::FETCH_ASSOC)):?>
                  <tr>
                      <td><?PHP echo $user['nm_modalidade'] ?></td>
                      <td><?PHP echo $user['nm_professor'] ?></td>
                      <td><?PHP echo $user['qt_aulasem'] ?></td>
                      <td><?PHP echo $user['qt_hraula'] ?></td>
                      <td>
              <a href="form-edit.php?id=<?php echo $user['id_professor'] ?>">Editar</a>
              <a href="delete.php?id=<?php echo $user['id_professor'] ?>"
              onclick="return confirm('Tem certeza que deseja remover?');">Excluir</a>
                      </td>
                  </tr>
                  <?php endwhile;?>
              </tbody>
          </table>
        <?php else: ?>
 
        <p>Nenhum usuário registrado</p>
 
        <?php endif; ?>
      </body>
</html>
