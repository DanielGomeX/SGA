<?php
    session_start();
    require_once '../Model/init.php';
    require '../controllers/check.php';
    include ('../controllers/buscarPagamento.php');     
    if($_SESSION['user_status'] == 1){
        include ('header.php');
    }elseif($_SESSION['user_status'] == 2){
        include ('headerAtendente.php');
    }
    elseif($_SESSION['user_status'] == 3){
        include ('headerProfessor.php');
    }
?>
        <h2 class="center">Sistema de Gerenciamento de Academia</h2>
        <div class="box box-solid box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Pagamento</h3>
            </div>
            <div class="box-body">
                
                <form action="../controllers/editarPagamento.php" method="POST"  align='middle'>
                                <div class="form-group">
			    		<label for="nomealuno">Nome do aluno:</label>
                                        <input required="required" class="form-control" type="text"
                                        id="nomealuno" name="nomealuno" value="<?php echo $user['nm_aluno'];?>" />
			    	</div>
                                <div class="form-group">
			    		<label for="moda">Modalidade:</label>
                                        <input required="required" class="form-control" type="text"
                                        id="moda" name="moda" value="<?php echo $user['nm_modalidade'];?>" />
			    	</div>
			    	<div class="form-group">
			    		<label for="valormensalidade">Valor da Mensalidade:</label>
                                        <input required="required" class="form-control" type="text"
                                        id="valormensalidade" name="valormensalidade" value="<?php echo $user['vl_mensalidade'];?>" />
			    	</div>
			    	<div class="form-group">
			    		<label for="mesreferente">Mês referente:</label>
                                        <input required="required" type="text" class="form-control"
                                        id="mesreferente" name="mesreferente" value="<?php echo $user['mes_referente'];?>"/>
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
			    </form>
                <a href="pagamento.php"><button class="btn btn-primary" id="voltar" >Voltar</button></a>
			</div>
		</div>
<?php include 'footer.php'; ?>