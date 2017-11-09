<?php
    session_start();
    require '../Model/init.php';
    require '../controllers/check.php';
    include ('../controllers/limitarModalidade.php');
    include ('headerAtendente.php'); 
?>
    
<form name="frmBusca" method="post" action="../Views/modalidadeList.php">
            <div class="input-group">
              <input type="text" name="cxnome" id="cxnome" class="form-control" placeholder="Digite o nome">
              <span class="input-group-btn">
                  <button type="submit" name="buscar" id="search-btn" class="btn btn-primary">
                    <i class="fa fa-search"></i>
                  </button>
              </span>
            </div>
        </form>  

<h2 class="center">Lista de Modalidades</h2>
          <h3 class="center">Total de Modalidades: <?php if(isset($total)){echo $total;} ?></h3>

          <?php if(isset($total) > 0):?>
          
          </br>
          <table class="table table-hover">
              <thead>
                  <tr>
                      <th>Nome da modalidade:</th>
                      <th>Quantidade de aulas por semana:</th>
                      <th>Nome Professor:</th>
                      <th>Quantidade de horas/aula:</th>
                  </tr>
              </thead>
              <tbody>
                  <?php while($user = $stmt->fetch(PDO::FETCH_ASSOC)):?>
                  <tr>                    
                    <td><?PHP echo $user['nm_modalidade'] ?></td>
                    <td><?PHP echo $user['qt_aulasem'] ?></td>
                    <td><?PHP echo $user['nm_professor'] ?></td>
                    <td><?PHP echo $user['qt_hraula'] ?></td>
                    <td>
                    <a href="modalidadeEdit.php?cd_modalidade=<?php echo $user['cd_modalidade'] ?>">
                    <button class="btn btn-primary fa fa-edit"></button></a>
                    <a href="../controllers/deletarModalidade.php?cd_modalidade=<?php echo $user['cd_modalidade'] ?>" onclick="return confirm('Tem certeza que deseja remover?');">
                    <button class="btn btn-danger fa fa-times"></button></a>
                      </td>
                  </tr>
                  <?php endwhile;?>
              </tbody>
          </table>
        <?php else: ?>
 
        <p>Nenhuma modalidade registrada</p>
 
            <?php endif; ?>
            </br>
            <nav>
              <ul class="pagination">
                <li>
                  <a href="modalidade.php?pagina=0" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                
                <?php 
                for($i=0;$i<$num_paginas;$i++){
                $estilo = "";
                if($pagina == $i)
                    $estilo = "class=\"active\"";
                ?>
                <li <?php echo $estilo; ?> ><a href="modalidade.php?pagina=<?php echo $i; ?>"><?php echo $i+1; ?></a></li>
                    <?php } ?>
                <li>
                  <a href="modalidade.php?pagina=<?php echo $num_paginas-1; ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
        <a href="modalidadeAdd.php"><button class="btn btn-primary fa fa-plus-square-o"> Modalidade</button></a>
        </div>              
    </div>              
</div>              
        
<?php include ('footer.php');?>