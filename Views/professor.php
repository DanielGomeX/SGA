<?php
session_start();
 
require '../Model/init.php';
require '../controllers/check.php';
include ('../controllers/limitarProfessor.php');
include ('header.php'); 
?>
<!-- search form (Optional) -->
<form name="frmBusca" method="post" action="../Views/profList.php">
            <div class="input-group">
              <input type="text" name="cxnome" id="cxnome" class="form-control" placeholder="Digite o nome">
              <span class="input-group-btn">
                  <button type="submit" name="buscar" id="search-btn" class="btn btn-primary">
                    <i class="fa fa-search"></i>
                  </button>
              </span>
            </div>
      </form>   
      <!-- /.search form -->
          <h2 class="center">Lista de professores</h2>
          <h3 class="center">Total de Professores: <?php if(isset($total)){echo $total;} ?></h3>

          <?php if(isset($total) > 0):?>
          
          </br>
          <table class="table table-hover">
              <thead>
                  <tr>
                      <th>Nome</th>
                      <th>Ações</th>
                  </tr>
              </thead>
              <tbody>
                  <?php while($user = $stmt->fetch(PDO::FETCH_ASSOC)):?>
                  <tr>                    
                    <td><?PHP echo $user['nm_professor'] ?></td>
                    <td>
                        <a href="profPesq.php?id=<?php echo $user['id_professor'] ?>">
                        <button class="btn btn-primary fa fa-search"></button></a>
                        <?php if($_SESSION['user_status'] == 1){ ?>
                            <a href="../controllers/deletarAluno.php?id=<?php echo $user['id_professor'] ?>" onclick="return confirm('Tem certeza que deseja remover?');">
                            <button class="btn btn-danger fa fa-times"></button></a>
                        <?php }elseif($_SESSION['user_status'] == 2 AND $_SESSION['user_status'] == 3){?>
                            <a></a>
                        <?php } ?>
                        </td>
                  </tr>
                  <?php endwhile;?>
              </tbody>
          </table>
        <?php else: ?>
 
        <p>Nenhum professor registrado</p>
            
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
       <a href="profAdd.php"><button class="btn btn-primary fa fa-plus-square-o"> Professor</button></a>
  
<?php 
  include ('footer.php');
?>