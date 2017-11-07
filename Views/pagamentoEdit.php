<?php
    session_start();
    require_once '../Model/init.php';
    require '../controllers/check.php';
    include ('../controllers/buscarPagamento.php');     
    include ('header.php');
?>
        <h2 class="center">Sistema de Gerenciamento de Academia</h2>
        <div class="box box-solid box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Pagamento</h3>
            </div>
            <div class="box-body">
                <div class="mensagem"><?php if(isset($msg)){echo $msg;} ?></div>
                <form action="../controllers/editarPagamento.php" method="POST"  align='middle'>
			    	<div class="form-group">
			    		<label for="valormensalidade">Valor da Mensalidade</label>
			        	<input class="form-control" type="text" id="valormensalidade" value="<?php echo $user['vl_modalidade'];?>" name="nomemodalidade"/>
			    	</div>
			    	<div class="form-group">
			    		<label for="mesreferente">Mês referente</label>
                                        <input type="text" class="form-control" id="mesreferente" value="<?php echo $mesdeagora = date('d-m-Y');?>"/>
			    	</div>
			    	<div class="form-group">
			    		<label for="quthorasaula">Data de vencimento</label>
                                        <select class="form-control" type="" id="qthorasaula" name="qtaulassemana">
                                            <option value="">Selecione...</option>
                                            <option value="dia5">Dia 5</option>
                                            <option value="dia10">Dia 10</option>
                                            <option value="dia15">Dia 15</option>
                                        </select>
			    	</div>
			        <label for="salvar"></label>
			        <button class="btn btn-primary" id="salvar" >Salvar</button>
			        <button class="btn btn-primary" id="voltar" formaction="pagamento.php">Voltar</button>
			    </form>
			</div>
		</div>
<?php include 'footer.php'; ?>