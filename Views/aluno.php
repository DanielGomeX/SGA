<?php
    session_start();
    require '../Model/init.php';
    require '../controllers/check.php';
    include ('../controllers/limitarAluno.php');
    include ('header.php');
?>

    <form name="frmBusca" method="post" action="../Views/alunoList.php">
                <div class="input-group">
                  <input type="text" name="cxnome" id="cxnome" class="form-control" placeholder="Digite o nome">
                  <span class="input-group-btn">
                      <button type="submit" name="buscar" id="search-btn" class="btn btn-primary">
                        <i class="fa fa-search"></i>
                      </button>
                  </span>
                </div>
            </form>  

    <h2 class="center">Lista de Alunos</h2>
              <h3 class="center">Total de Alunos: <?php if(isset($total)){echo $total;} ?></h3>

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
                        <td><?PHP echo $user['nm_aluno'] ?></td>
                        <td><?PHP echo $user['registro_geral_aluno'] ?></td>
                        <td><?PHP echo $user['cpf_aluno'] ?></td>
                        <td><?PHP echo date("d/m/Y", strtotime($user['dt_nascimento_aluno'])) ?></td>
                        <td><?PHP echo $user['nm_endereco'] ?></td>
                        <td><?PHP echo $user['nm_email_aluno'] ?></td>
                        <td><?PHP echo $user['cd_telefone_aluno'] ?></td>
                        <td>
                        <a href="alunoEdit.php?id=<?php echo $user['matricula_aluno'] ?>">
                        <button class="btn btn-primary fa fa-edit"></button></a>
                        <a href="../controllers/deletarAluno.php?id=<?php echo $user['matricula_aluno'] ?>" onclick="return confirm('Tem certeza que deseja remover?');">
                        <button class="btn btn-danger fa fa-times"></button></a>
                          </td>
                      </tr>
                      <?php endwhile;?>
                  </tbody>
              </table>
            <?php else: ?>

            <p>Nenhum Aluno registrado</p>

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
            <a href="alunoAdd.php"><button class="btn btn-primary fa fa-plus-square-o"> Aluno</button></a>
            </div>
        </div>
    </div>
    
         
<?php include ('footer.php');?>