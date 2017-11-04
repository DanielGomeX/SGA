<?php
    session_start();
    require_once '../Model/init.php';
    require '../controllers/check.php';
    include ('../controllers/buscarAluno.php');     
    include ('header.php');
?>
        <h2 class="center">Sistema de Gerenciamento de Academia</h2>
        <div class="box box-solid box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Modalidade</h3>
            </div>
            <div class="box-body">
                <div class="mensagem"><?php if(isset($msg)){echo $msg;} ?></div>
                <form action="../controllers/editarModalidade.php" method="POST"  align='middle'>
                    <div class="form-group">
			<label for="nome">Nome do Professor</label>
                              <select class="form-control" type="" id="nome" name="nome">
                                 <option>Selecione...</option>
                                    <?php
                                        $pdo = db_connect();
                                        $sql = "SELECT nm_professor FROM professor ORDER BY nm_professor";
					foreach ($pdo->query($sql) as $row) {
                                            echo "<option value='".$row['nm_professor']."'>".$row['nm_professor']."</option>";
                                        }
                                    ?>
                                 <option value="<?php echo $user['nm_professor'];?>"></option>
                                </select>
			    	</div>
			    	<div class="form-group">
			    		<label for="nomemodalidade">Nome da modalidade</label>
			        	<input class="form-control" type="text" id="nomemodalidade" value="<?php echo $user['nm_modalidade'];?>" name="nomemodalidade"  placeholder="Nome da Modalidade"/>
			    	</div>
			    	<div class="form-group">
			    		<label for="qtaulassemana">Quantidade de aulas por semana</label>
                                        <select class="form-control" type="" id="qtaulassemana" name="qtaulassemana">
                                            <option value="">Selecione...</option>
                                            <option value="1">1 aula</option>
                                            <option value="2">2 aulas</option>
                                            <option value="3">3 aulas</option>
                                            <option value="4">4 aulas</option>
                                            <option value="5">5 aulas</option>
                                            <option value="<?php echo $user['qt_aulasem'];?>"></option>
                                        </select>
			    	</div>
			    	<div class="form-group">
			    		<label for="quthorasaula">Quantidade de horas/aula</label>
                                        <select class="form-control" type="" id="qthorasaula" name="qtaulassemana">
                                            <option value="">Selecione...</option>
                                            <option value="1">1 hora/aula</option>
                                            <option value="2">2 horas/aula</option>
                                            <option value="3">3 horas/aula</option>
                                            <option value="4">4 horas/aula</option>
                                            <option value="5">5 horas/aula</option>
                                            <option value="<?php echo $user['qt_hraula'];?>"></option>
                                        </select>
			    	</div>
			        <label for="salvar"></label>
			        <button class="btn btn-primary" id="salvar" >Salvar</button>
			        <button class="btn btn-primary" id="voltar" formaction="modalidade.php">Voltar</button>
			    </form>
			</div>
		</div>
<?php include 'footer.php'; ?>