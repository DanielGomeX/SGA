<?php
	session_start();
    require_once '../Model/init.php';
    
    if($_SESSION['user_status'] == '1'){
    include 'header.php';
    }elseif($_SESSION['user_status'] == '2'){
        include 'headerAtendente.php';
    }else{
        include 'headerProfessor';
    }
?>
		
        <h2 class="center">Sistema de Gerenciamento de Academia</h2>
        <div class="box box-solid box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Cadastrar Aluno</h3>
            </div>
            <div class="box-body">
                <div class="mensagem"><?php if(isset($msg)){echo $msg;} ?></div>
                <form action="../controllers/cadastrarAluno.php" method="POST"  align='middle'>
			    	<div class="form-group">
			    		<label for="nome">Nome</label>
                                        <input required="required" class="form-control" type="text" id="nome" name="nome" placeholder="Nome do Aluno" />
			    	</div>
			    	<div class="form-group">
			    		<label for="rg">RG</label>
			        	<input required="required" class="form-control" type="text" id="rg" name="rg" maxlength="9" placeholder="RG"/>
			    	</div>
			    	<div class="form-group">
			    		<label for="cpf">CPF</label>
			        	<input required="required" class="form-control" type="text" id="cpf" name="cpf" maxlength="11" placeholder="CPF"/>
			    	</div>
			    	<div class="form-group">
			    		<label for="dtnasc">Data de Nascimento</label>
                                        <input required="required" min="1940-01-01" max="2025-12-01" class="form-control" type="date" id="dtnasc" name="dtnasc" placeholder="Data de nascimento"/>
			    	</div>
			    	<div class="form-group">
			    		<label for="endereço">Endereço</label>
			        	<input required="required" class="form-control" type="text" id="end" name="end" placeholder="Endereço"/>
			    	</div>
			    	<div class="form-group">
			    		<label for="email">Email</label>
			        	<input required="required" class="form-control" type="text" id="email" name="email" placeholder="E-mail"/>
			    	</div>
			    	<div class="form-group">
			    		<label for="tel">Telefone</label>
                                        <input required="required" class="form-control" type="text" id="tel" name="tel" maxlength="12" placeholder="Telefone"/>
			    	</div>
                                <div class="form-group">
			    		<label for="plan">Plano</label>
                                        <select name="tipoplano" id="moda" class="form-control">
                                        <option id="plan" class="form-control">Selecione o tipo de plano</option>
                                        <?php 
                                            $PDO = db_connect();
                                            $sql = "SELECT tipo_plano FROM plano";
                                            $stmt = $PDO->prepare($sql);
                                            $stmt->execute();
                                        while($plan = $stmt->fetch(PDO::FETCH_ASSOC)) {?>
                                        <option value="<?php echo $plan['tipo_plano'] ;?>" id="plan" class="form-control">
                                        <?php echo $plan['tipo_plano'] ;?></option>
                                        <?php  }?>
                                        </select>
			    	</div>
                                <div class="form-group">
                                    <label for="moda">Modalidade</label></br>
                                        <?php 
                                            $sql = "SELECT nm_modalidade FROM modalidade";
                                            $stmt = $PDO->prepare($sql);
                                            $stmt->execute();
                                        while($plan = $stmt->fetch(PDO::FETCH_ASSOC)) {?>
                                        <input type="checkbox" name="moda" value="<?php echo $plan['nm_modalidade'] ;?>" >
                                            <?php echo $plan['nm_modalidade'] ;?></br>
                                        <?php  }?>
                                        </select>
			    	</div>
			        <label for="salvar"></label>
			        <button class="btn btn-primary" id="salvar" >Salvar</button>
			        <button class="btn btn-primary" id="voltar" formaction="aluno.php">Voltar</button>
			    </form>
			</div>
		</div>
<?php include 'footer.php'; ?>