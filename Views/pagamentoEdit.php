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
                                        <input required="required" class="form-control" type="text" id="valormensalidade" name="valormensalidade" value="<?php echo $user['vl_mensalidade'];?>" />
			    	</div>
			    	<div class="form-group">
			    		<label for="mesreferente">Mês referente</label>
                                        <input required="required" type="text" class="form-control" id="mesreferente" name="mesreferente" value="<?php echo $user['mes_referente'];?>"/>
			    	</div>
			    	<div class="form-group">
                                        <label for="dtvencimento">Data de vencimento</label></br>
                                    <input required="required" type="radio" id="dtvencimento" name="dtvencimento" value="dia 5" <?php if($user['dt_vencimento']=='dia 5'){echo "checked";}?>/>Dia 5</br>
                                    <input type="radio" id="dtvencimento" name="dtvencimento" value="dia 10" <?php if($user['dt_vencimento']=='dia 10'){echo "checked";}?>/>Dia 10</br>
                                    <input type="radio" id="dtvencimento" name="dtvencimento" value="dia 15"<?php if($user['dt_vencimento']=='dia 15'){echo "checked";}?>/>Dia 15</br>
			    	</div>
                    
                                <input type="hidden" name="cdpagamento" value="<?php echo  $cdpagamento?>;">
			        <label for="salvar"></label>
			        <button class="btn btn-primary" id="salvar" >Salvar</button>
			        <button class="btn btn-primary" id="voltar" formaction="pagamento.php">Voltar</button>
			    </form>
			</div>
		</div>
<?php include 'footer.php'; ?>