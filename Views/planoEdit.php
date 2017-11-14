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
                        <input type="radio" id="tipoplano" name="tipoplano" value="mensal" <?php if($user['tipo_plano']=='mensal'){echo "checked";}?>/>Mensal</br>
                        <input type="radio" id="tipoplano" name="tipoplano" value="trimestral" <?php if($user['tipo_plano']=='trimestral'){echo "checked";}?>/>Trimestral</br>
                        <input type="radio" id="tipoplano" name="tipoplano" value="semestral" <?php if($user['tipo_plano']=='semestral'){echo "checked";}?>/>Semestral</br>
                        <input type="radio" id="tipoplano" name="tipoplano" value="anual" <?php if($user['tipo_plano']=='anual'){echo "checked";}?>/>Anual</br>
                        
                    </div>
                    </br>
                    <div class="form-group">
                        <label for="formapgto" class="cadastroplano">Forma de pagamento:</label></br>
                        <input type="radio" id="formapgto" name="formapagamento" value="dinheiro" <?php if($user['forma_pagamento']=='dinheiro'){echo "checked";}?>/>Dinheiro</br>
                        <input type="radio" id="formapgto" name="formapagamento" value="cartaocredito" <?php if($user['forma_pagamento']=='cartaocredito'){echo "checked";}?>/>Cartão de Crédito</br>
                        <input type="radio" id="formapgto" name="formapagamento" value="cartaodebito" <?php if($user['forma_pagamento']=='cartaodebito'){echo "checked";}?>/>Cartão de Débito</br>
                    </div>
                    </br>
                    <div class="form-group">
                         <label for="moda">Modalidade:</label>
                         <select name="moda">
                             <option id="moda" class="form-control">Selecione...</option>
                             <?php
                                 $PDO = db_connect();
                                 $sql = "SELECT nm_modalidade FROM plano ORDER BY nm_modalidade ASC";
                                 $stmt = $PDO->prepare($sql);
                                 $stmt->execute();
                             while($plan = $stmt->fetch(PDO::FETCH_ASSOC)) {?>
                             <option <?php if($plan['nm_modalidade']==$user['nm_modalidade']){echo 'selected';} ?>
                                 value="<?php echo $plan['nm_modalidade'] ;?> "id="moda" class="form-control">
                             <?php echo $plan['nm_modalidade'];?></option>
                             <?php }?>
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