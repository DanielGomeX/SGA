<?php	
    session_start();
    require_once '../Model/init.php';
    include 'header.php';
?>
        <h2 class="center">Sistema de Gerenciamento de Academia</h2>
        <div class="box box-solid box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Cadastrar Modalidade</h3>
            </div>
            <div class="box-body">
                <div class="mensagem"><?php if(isset($msg)){echo $msg;} ?></div>
                <form action="../controllers/cadastrarModalidade.php" method="POST"  align='middle'>
			    	<div class="form-group">
			    		<label for="nomemodalidade">Nome da modalidade</label>
                                        <input required="required" class="form-control" type="text" id="nomemodalidade"  name="nomemodalidade" placeholder="Nome da Modalidade"/>
			    	</div>
			    	<div class="form-group">
			    		<label for="qtaulassemana">Quantidade de aulas por semana</label>
                                        <input required="required" class="form-control" type="number" min="1" max="5" id="qtaulassemana" name="qtaulassemana" placeholder="Quantidade de aulas por semana">
			    	</div>
                                <div class="form-group">
                                    <label for="professor">Nome do professor</label>
                                    <select name="professor" class="form-control" id="professor">
                                        <option>Selecione o nome do professor</option>
                                        <?php 
                                        $PDO = db_connect();
                                        $sql = "SELECT nm_professor FROM professor ORDER BY nm_professor ASC";
                                        $stmt = $PDO->prepare($sql);
                                        $stmt->execute();
                                        while($nmprof = $stmt->fetch(PDO::FETCH_ASSOC)){?>
                                        <option  value="<?php echo $nmprof['nm_professor'] ?>">
                                        <?php echo $nmprof['nm_professor'] ?></option>
                                        <?php } ?>
                                    </select>
			    	</div>
			    	<div class="form-group">
			    		<label for="quthorasaula">Quantidade de horas/aula</label>
                                        <input required="required" class="form-control" type="number" min="1" max="5" id="qthorasaula" name="qthorasaula" placeholder="Quantidade de horas/aula">
			    	</div>
			        <label for="salvar"></label>
			        <button class="btn btn-primary" id="salvar" >Salvar</button>
			        <button class="btn btn-primary" id="voltar" formaction="modalidade.php">Voltar</button>
			    </form>
			</div>
		</div>
<?php include 'footer.php'; ?>