<?php
	session_start();
    require_once '../Model/init.php';
    include 'header.php';
?>
		
        <h2 class="center">Sistema de Gerenciamento de Academia</h2>
        <div class="box box-solid box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Cadastrar Plano</h3>
            </div>
            <div class="box-body">
                <div class="mensagem"><?php if(isset($msg)){echo $msg;} ?></div>
                <form action="../controllers/cadastrarPlano.php" method="POST"  align='middle'>
			    	<div class="form-group">
                                    <label for="tipoplano" class="cadastroplano">Tipo do plano:</label></br>
                                    <input required="required" type="radio" id="tipoplano" name="tipoplano" value="mensal"/>Mensal</br>
                                    <input type="radio" id="tipoplano" name="tipoplano" value="trimestral"/>Trimestral</br>
                                    <input type="radio" id="tipoplano" name="tipoplano" value="semestral"/>Semestral</br>
                                    <input type="radio" id="tipoplano" name="tipoplano" value="anual"/>Anual</br>
			    	</div>
                                </br>
                                <div class="form-group">
                                    <label for="formapgto" class="cadastroplano">Forma de pagamento:</label></br>
                                    <input required="required" type="radio" id="formapgto" name="formapagamento" value="dinheiro"/>Dinheiro</br>
                                    <input type="radio" id="formapgto" name="formapagamento" value="cartaocredito"/>Cartão de Crédito</br>
                                    <input type="radio" id="formapgto" name="formapagamento" value="cartaodebito"/>Cartão de Débito</br>
			    	</div>
                                </br>
                                <div class="form-group">
                                    <label for="tel">Modalidade:</label>
                                    <select name="moda">
                                        <option id="plan" class="form-control">Selecione...</option>
                                        <?php
                                            $PDO = db_connect();
                                            $sql = "SELECT nm_modalidade FROM modalidade ORDER BY nm_modalidade ASC";
                                            $stmt = $PDO->prepare($sql);
                                            $stmt->execute();
                                        while($plan = $stmt->fetch(PDO::FETCH_ASSOC)) {?>
                                        <option value="<?php echo $plan['nm_modalidade'] ;?>"id="moda" class="form-control">
                                        <?php echo $plan['nm_modalidade'] ;?></option>
                                        <?php  }?>
                                    </select>
                                </div>
			        <label for="salvar"></label>
			        <button class="btn btn-primary" id="salvar" >Salvar</button>
			    </form>
                <a href="plano.php"><button class="btn btn-primary" id="voltar" >Voltar</button></a>
			</div>
		</div>
<?php include 'footer.php'; ?>