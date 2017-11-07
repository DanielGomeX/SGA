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
                                        <input required="required" class="form-control" type="number" min="1" max="5" id="qtaulassemana" name="qtaulassemana">
			    	</div>
			    	<div class="form-group">
			    		<label for="quthorasaula">Quantidade de horas/aula</label>
                                        <input required="required" class="form-control" type="number" min="1" max="5" id="qthorasaula" name="qthorasaula">
			    	</div>
			        <label for="salvar"></label>
			        <button class="btn btn-primary" id="salvar" >Salvar</button>
			        <button class="btn btn-primary" id="voltar" formaction="modalidade.php">Voltar</button>
			    </form>
			</div>
		</div>
<?php include 'footer.php'; ?>