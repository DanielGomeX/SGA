<?php
    session_start();
    require_once '../Model/init.php';
    require '../controllers/check.php';
    include '../controllers/buscarPlano.php';
    include ('header.php');
?>
        <h2 class="center">Sistema de Gerenciamento de Academia</h2>
      
        <div class="box box-solid box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Plano</h3>
            </div>
            <div class="box-body">
                <form action="../controllers/editarPlano.php" method="POST"  align='middle'>
                    <div class="form-group">
                        <label for="tipoplano" class="cadastroplano">Tipo do plano:</label></br>
                        <input type="radio" id="tipoplano" name="tipoplano" value="mensal" <?php if($user == "mensal"){echo "checked=\"checked\""} ?> />Mensal</br>
                        <input type="radio" id="tipoplano" name="tipoplano" value="trimestral" <?php if($user == "trimestral"){echo "checked=\"checked\""} ?> />Trimestral</br>
                        <input type="radio" id="tipoplano" name="tipoplano" value="semestral" <?php echo ($user == 'semestral')? "checked": null;?>/>Semestral</br>
                        <input type="radio" id="tipoplano" name="tipoplano" value="anual" <?php echo ($user == 'anual')? "checked": null;?>/>Anual</br>
                        
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
                    
                    <input type="hidden" name="cdplano" value="<?php echo $cdplano ?>"/>
                    <label for="alterar"></label>        
                    <button class="btn btn-primary" id="alterar" >Salvar</button>
                    <button class="btn btn-primary" id="salvar" formaction="plano.php">Voltar</button>
                </form>
            </div>
        </div>
<?php include ('footer.php'); ?>