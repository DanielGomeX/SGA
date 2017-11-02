<?php
    session_start();
    require_once '../Model/init.php';
    include 'header.php';
    $msg="";
?>
	<h2 class="center">Sistema de Gerenciamento de Academia</h2>
		<div class="box box-solid box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Resultado da busca</h3>
            </div>
            <div class="box-body">
            	<div class="mensagem"><?php echo $msg; ?></div>
		        <?php
		            $nome = $_POST['cxnome'];
		            $pesquisa = $_POST['buscar'];
		            
		            $PDO = db_connect();
		            if(isset($pesquisa)&&!empty($nome)){
		            $stmt = $PDO->prepare("SELECT * FROM professor
		                                            WHERE nm_professor
		                                            LIKE :letra");
		           
		            $stmt->bindValue(':letra', '%'.$nome.'%', PDO::PARAM_STR);
		            $stmt->execute();
		            $resultados = $stmt->rowCount();

		            if($resultados>=1){
		                echo "Resultado(s) encontrado(s): ".$resultados."<br /><br />";
		                echo "<table class='table table-hover'>";
		                 echo'<thead>';
		                  echo'<tr>';
		                      echo '<th>Nome:</th>';
		                      echo '<th>RG:</th>';
		                      echo '<th>CPF:</th>';
		                      echo '<th>Data de Nascimento:</th>';
		                      echo '<th>Endereço:</th>';
		                      echo '<th>Email:</th>';
		                      echo '<th>Telefone</th>';
		                  echo '</tr>';
		              echo '</thead>';
		              echo '<tbody>';
		                while($reg = $stmt->fetch(PDO::FETCH_OBJ)){
		                  echo '<tr>';
		                  echo '<td>'.$reg->nm_professor.'</td>';
		                  echo '<td>'.$reg->registro_geral_professor.'</td>';
		                  echo '<td>'.$reg->cpf_professor.'</td>';
		                  echo '<td>'. date("d/m/Y", strtotime($reg->dt_nascimento_professor)).'</td>';
		                  echo '<td>'.$reg->nm_endereco.'</td>';
		                  echo '<td>'.$reg->nm_email_professor.'</td>';
		                  echo '<td>'.$reg->cd_telefone_professor.'</td>';
		                  echo '</tr>';
		                
		                }
		                echo '</tbody>';
		                echo '</table>';
		                echo '</br>';
		                echo "<a href='professor.php')><button class='btn btn-primary'>Voltar</button></a> ";
		                }else{
		                    echo "Não existe usuario cadastrado";
		                    echo "</br><a href='index.php')><button class='btn btn-primary'>Voltar</button></a> ";
		                }
		                }
		                else{
		                    echo "Preencha o campo de pesquisa";
		                    echo "</br><a href='index.php')><button class='btn btn-primary'>Voltar</button></a> ";
		                }
		        ?>
		    </div>
		</div>              
<?php include 'footer.php'; ?>
