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
                                    <input type="radio" id="tipoplano" name="tipoplano" value="mensal"/>Mensal</br>
                                    <input type="radio" id="tipoplano" name="tipoplano" value="trimestral"/>Trimestral</br>
                                    <input type="radio" id="tipoplano" name="tipoplano" value="semestral"/>Semestral</br>
                                    <input type="radio" id="tipoplano" name="tipoplano" value="anual"/>Anual</br>
			    	</div>
                                </br>
                                <div class="form-group">
                                    <label for="formapgto" class="cadastroplano">Forma de pagamento:</label></br>
                                    <input type="radio" id="formapgto" name="formapagamento" value="dinheiro"/>Dinheiro</br>
                                    <input type="radio" id="formapgto" name="formapagamento" value="cartaocredito"/>Cartão de Crédito</br>
                                    <input type="radio" id="formapgto" name="formapagamento" value="cartaodebito"/>Cartão de Débito</br>
			    	</div>
                                
			    	<div class="form-group">
                                    <label for="modalidade" class="cadastroplano">Modalidade:</label>
                                    <select class="form-control" type="" id="modalidade" name="modalidade">
                                    <option>Selecione...</option>
                                    <?php
                                        $pdo = db_connect();
                                        $sql = "SELECT nm_modalidade FROM modalidade ORDER BY nm_modalidade ASC";
					foreach ($pdo->query($sql) as $row) {
                                            echo "<option value='".$row['nm_modalidade']."'>".$row['nm_modalidade']."</option>";
                                            
                                        }
                                    ?>
                                <!--<input type="hidden" id="nm_modalidade" name="nm_modalidade" value="<?php// $modalidade = "SELECT nm_modalidade FROM modalidade"?>"/>-->
                                </select>
			    	</div>
			        <label for="salvar"></label>
			        <button class="btn btn-primary" id="salvar" >Salvar</button>
			        <button class="btn btn-primary" id="voltar" formaction="plano.php">Voltar</button>
			    </form>
			</div>
		</div>
<?php include 'footer.php'; ?>