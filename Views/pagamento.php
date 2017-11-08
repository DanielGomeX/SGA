<?php
    session_start();
    require '../Model/init.php';
    require '../controllers/check.php';
    include ('../controllers/limitarPagamento.php');
    include ('header.php'); 
?>
    
<form name="frmBusca" method="post" action="../Views/pagamentoList.php">
            <div class="input-group">
              <input type="text" name="cxnome" id="cxnome" class="form-control" placeholder="Digite o nome">
              <span class="input-group-btn">
                  <button type="submit" name="buscar" id="search-btn" class="btn btn-primary">
                    <i class="fa fa-search"></i>
                  </button>
              </span>
            </div>
        </form>  

<h2 class="center">Lista de Pagamentos</h2>
          <h3 class="center">Total de Pagamentos: <?php if(isset($total)){echo $total;} ?></h3>

          <?php if(isset($total) > 0):?>
          
          </br>
          <table class="table table-hover">
              <thead>
                  <tr>
                      <th>Valor da mensalidade(em R$):</th>
                      <th>Mês referente:</th>
                      <th>Data de vencimento:</th>
                  </tr>
              </thead>
              <tbody>
                  <?php while($user = $stmt->fetch(PDO::FETCH_ASSOC)):?>
                  <tr>                    
                    <td><?PHP echo $user['vl_mensalidade'] ?></td>
                    <td><?PHP echo $user['mes_referente'] ?></td>
                    <td><?PHP echo $user['dt_vencimento'] ?></td>
                    <td>
                    <a href="pagamentoEdit.php?cdpagamento=<?php echo $user['cd_pagamento'] ?>">
                    <button class="btn btn-primary fa fa-edit"></button></a>
                    <a href="../controllers/deletarPagamento.php?cdpagamento=<?php echo $user['cd_pagamento'] ?>" onclick="return confirm('Tem certeza que deseja remover?');">
                    <button class="btn btn-danger fa fa-times"></button></a>
                      </td>
                  </tr>
                  <?php endwhile;?>
              </tbody>
              
          </table>
        <?php else: ?>
 
        <p>Nenhum Pagamento registrado</p>
 
        <?php endif; ?>
        </br>
       <a href="pagamentoAdd.php"><button class="btn btn-primary fa fa-plus-square-o"> Pagamento</button></a>

<?php include ('footer.php');?>