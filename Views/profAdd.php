<?php
	session_start();
    require_once '../controllers/header.php';
    include 'header.php';
?>
		
        <h2 class="center">Sistema de Gerenciamento de Academia</h2>
        <div class="box box-solid box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Cadastrar Professor</h3>
            </div>
            <div class="box-body">
            	<div class="mensagem"><?php echo $msg; ?></div>
			    <form action="../controllers/cadastroProfessor.php" method="POST"  align='middle'>
			    	<div class="form-group">
			    		<label for="nome">Nome</label>
			        	<input class="form-control" type="text" id="nome" name="nome" placeholder="Nome do professor" />
			    	</div>
			    	<div class="form-group">
			    		<label for="rg">RG</label>
			        	<input class="form-control" type="text" id="rg" name="rg" maxlength="9" placeholder="RG"/>
			    	</div>
			    	<div class="form-group">
			    		<label for="cpf">CPF</label>
			        	<input class="form-control" type="text" id="cpf" name="cpf" maxlength="11" placeholder="CPF"/>
			    	</div>
			    	<div class="form-group">
			    		<label for="dtnasc">Data de Nascimento</label>
			        	<input class="form-control" type="date" id="dtnasc" name="dtnasc" placeholder="Data de nascimento"/>
			    	</div>
			    	<div class="form-group">
			    		<label for="endereço">Endereço</label>
			        	<input class="form-control" type="text" id="end" name="end" placeholder="Endereço"/>
			    	</div>
			    	<div class="form-group">
			    		<label for="email">Email</label>
			        	<input class="form-control" type="text" id="email" name="email" placeholder="E-mail"/>
			    	</div>
			    	<div class="form-group">
			    		<label for="tel">Telefone</label>
			        	<input class="form-control" type="text" id="tel" name="tel" placeholder="Telefone"/>
			    	</div> 
			        <label for="salvar"></label>
			        <button class="btn btn-primary" id="salvar" >Salvar</button>
			        <button class="btn btn-primary" id="voltar" formaction="professor.php">Voltar</button>
			    </form>
			</div>
		</div>
<?php include 'footer.php'; ?>