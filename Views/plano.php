<?php
    session_start();
    require '../Model/init.php';
    require '../controllers/check.php';
    include ('../controllers/limitarPlano.php');
    include ('header.php'); 
?>
    
<form name="frmBusca" method="post" action="../Views/planoList.php">
            <div class="input-group">
              <input type="text" name="cxnome" id="cxnome" class="form-control" placeholder="Digite o nome">
              <span class="input-group-btn">
                  <button type="submit" name="buscar" id="search-btn" class="btn btn-primary">
                    <i class="fa fa-search"></i>
                  </button>
              </span>
            </div>
        </form>  

<h2 class="center">Lista de Planos</h2>
          <h3 class="center">Total de Planos: <?php if(isset($total)){echo $total;} ?></h3>

          <?php if(isset($total) > 0):?>
          
          </br>
          <table class="table table-hover">
              <thead>
                  <tr>
                      <th>Tipo de Plano</th>
                      <th>Forma de pagamento</th>
                      <th>Modalidade</th>
                  </tr>
              </thead>
              <tbody>
                  <?php while($user = $stmt->fetch(PDO::FETCH_ASSOC)):?>
                  <tr>                    
                    <td><?PHP echo $user['tipo_plano'] ?></td>
                    <td><?PHP echo $user['forma_pagamento'] ?></td>
                    <td><?PHP echo $user['nm_modalidade'] ?></td>
                    <td>
                    <a href="planoEdit.php?id=<?php echo $user['cd_plano'] ?>">
                    <button class="btn btn-primary fa fa-edit"></button></a>
                    <a href="../controllers/deletarPlano.php?id=<?php echo $user['matricula_aluno'] ?>" onclick="return confirm('Tem certeza que deseja remover?');">
                    <button class="btn btn-danger fa fa-times"></button></a>
                      </td>
                  </tr>
                  <?php endwhile;?>
              </tbody>
          </table>
        <?php else: ?>
 
        <p>Nenhum Plano registrado</p>
 
        <?php endif; ?>
        </br>
       <a href="planoAdd.php"><button class="btn btn-primary fa fa-plus-square-o"> Plano</button></a>

<?php include ('footer.php');?>