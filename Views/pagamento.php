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
            <nav>
              <ul class="pagination">
                <li>
                  <a href="pagamento.php?pagina=0" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                
                <?php 
                for($i=0;$i<$num_paginas;$i++){
                $estilo = "";
                if($pagina == $i)
                    $estilo = "class=\"active\"";
                ?>
                <li <?php echo $estilo; ?> ><a href="pagamento.php?pagina=<?php echo $i; ?>"><?php echo $i+1; ?></a></li>
                    <?php } ?>
                <li>
                  <a href="pagamento.php?pagina=<?php echo $num_paginas-1; ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
       <a href="pagamentoAdd.php"><button class="btn btn-primary fa fa-plus-square-o"> Pagamento</button></a>
        </div>
     </div>
</div>
<?php include ('footer.php');?>