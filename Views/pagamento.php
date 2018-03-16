<?php
    session_start();
    require '../Model/init.php';
    require '../controllers/check.php';
    include ('../controllers/limitarPagamento.php');
    
    if($_SESSION['user_status'] == 1){
        include ('header.php');
    }elseif($_SESSION['user_status'] == 2){
        include ('headerAtendente.php');
    }
    elseif($_SESSION['user_status'] == 3){
        include ('headerProfessor.php');
    }
    
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
                      <th>Nome do Aluno</th>
                  </tr>
              </thead>
              <tbody>
                  <?php while($user = $stmt->fetch(PDO::FETCH_ASSOC)):?>
                 <tr>
                    <td><?php echo $user['nm_aluno']?></td>
                    <td>
                    <a href="pagamentoPesq.php?cdpagamento=<?php echo $user['cd_pagamento'] ?>" alt="Visualizar aluno">
                    <button class="btn btn-primary fa fa-search"></button></a>
                    <a href="comprovante.php?cdpagamento=<?php echo $user['cd_pagamento'] ?>" alt="Emitir Recibo">
                    <button class="btn btn-warning fa fa-file"></button></a>
                    <a href="../controllers/deletarPagamento.php?cdpagamento=<?php echo $user['cd_pagamento'] ?>" alt="Excluir" onclick="return confirm('Tem certeza que deseja remover?');">
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
            <?php 
           if ($total > 1) {
		echo "<nav>";
		echo "	<ul class='pagination pagination-sm'>";

		if ($anterior > 0) {
			echo "<li>";
			echo "	<a href='?pg=".$anterior."' aria-label='Previous'>";
			echo "		<span aria-hidden='true'>«</span>";
			echo "	</a>";
			echo "</li>";
		} else {
			echo "<li class='disabled'>";
			echo "	<span aria-hidden='true'>«</span>";
			echo "</li>";
		}
		
		
		for ($i=1;$i<=$total;$i++) {
			if ($i < ($pg-4) AND $i == 1) {
				echo "<li><a href='?pg=".$i."'>".$i."</a></li>";
				echo "<li><a>...</a></li>";
			}
			
			if ($i >= ($pg-4) AND $i <= ($pg+4)) {
				if ($i == $pg) {
					echo "<li class='active'><a href='?pg=".$i."'>".$i."</a></li>";
				} else {
					echo "<li><a href='?pg=".$i."'>".$i."</a></li>";
				}
			}
			
			if ($i > ($pg+4) AND $i == $total) {
				echo "<li><a>...</a></li>";
				echo "<li><a href='?pg=".$i."'>".$i."</a></li>";
			}
		}
		
                        if($pg < $total) {
                                echo "<li>";
                                echo "	<a href='?pg=".$proximo."' aria-label='Next'>";
                                echo "		<span aria-hidden='true'>»</span>";
                                echo "	</a>";
                                echo "</li>";
                        } else {
                                echo "<li class='disabled'>";
                                echo "	<span aria-hidden='true'>»</span>";
                                echo "</li>";
                        }

                        echo "  </ul>";
                        echo "</nav>";
            }
            ?>
       <a href="pagamentoAdd.php"><button class="btn btn-primary fa fa-plus-square-o"> Pagamento</button></a>
       
<?php include ('footer.php');?>