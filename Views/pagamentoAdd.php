<?php	
    session_start();
    require_once '../Model/init.php';
    include 'header.php';
?>
        <h2 class="center">Sistema de Gerenciamento de Academia</h2>
        <div class="box box-solid box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Cadastrar Pagamento</h3>
            </div>
            <div class="box-body">
                <div class="mensagem"><?php if(isset($msg)){echo $msg;} ?></div>
                <form action="../controllers/cadastrarPagamento.php" method="POST"  align='middle'>
                    <div class="form-group">
                        <label for="nomealuno">Nome do Aluno:</label>
                        <select>
                            <option>Selecione...</option>
                            <?php 
                               $PDO = db_connect();
                               $sql = "SELECT nm_aluno FROM aluno ORDER BY nm_aluno ASC";
                               $stmt = $PDO->prepare($sql);
                               $stmt->execute();
                               while($alu = $stmt->fetch(PDO::FETCH_ASSOC)){?>
                            <option value="<?php echo $alu['nm_aluno'] ?>"><?php echo $alu['nm_aluno'] ?></option>    
                         <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                         <label for="moda">Modalidade</label>
                         <select>
                             <option>Selecione...</option>
                             <?php
                                $sql1 = "SELECT nm_modalidade FROM modalidade ORDER BY nm_modalidade ASC";
                                $stmt = $PDO->prepare($sql1);
                                $stmt->execute();
                                while($moda = $stmt->fetch(PDO::FETCH_ASSOC)){?>
                             <option value="<?php echo $moda['nm_modalidade']?>">
                             <?php echo $moda['nm_modalidade']?></option>
                                <?php } ?>
                         </select>
		 	</div>
		 	<div class="form-group">
                         <label for="valormensalidade">Valor da Mensalidade</label>
                         <input pattern="[0-9]+$" maxlength="3" required="required"
                                title="Digite apenas Números"
                             accept=""class="form-control" type="text" id="valormensalidade"
                             name="valormensalidade" placeholder="Valor da mensalidade"/>
		 	</div>
		 	<div class="form-group">
                         <label for="mesreferente">Mês referente</label>
                         <input type="month" class="form-control"
                                id="mesreferente" name="mesreferente" value=""/>
		 	</div>
		 	<div class="form-group">
                         <label for="dtvencimento">Data de vencimento</label></br>
                         <input required="required" type="radio" id="dtvencimento" name="dtvencimento" value="dia 5"/>Dia 5</br>
                         <input type="radio" id="dtvencimento" name="dtvencimento" value="dia 10"/>Dia 10</br>
                         <input type="radio" id="dtvencimento" name="dtvencimento" value="dia 15"/>Dia 15</br>
		 	</div>
                        <label for="salvar"></label>
                    <button class="btn btn-primary" id="salvar" >Salvar</button>
                     <button class="btn btn-primary" id="voltar" formaction="pagamento.php">Voltar</button>
		 </form>
			</div>
		</div>
<?php include 'footer.php'; ?>