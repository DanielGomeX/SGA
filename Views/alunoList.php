<?php
    session_start();
    require_once '../Model/init.php';
    require_once '../controllers/header.php';
    include 'header.php';
    $msg="";
?>
	<h2 class="center">Sistema de Gerenciamento de Academia</h2>
		<div class="box box-solid box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Resultado da busca</h3>
            </div>
            <div class="box-body">
            	<div class="mensagem"><?php echo $msg; ?></div>
		      <?php
                        		            
                        $id="";
                        $nome="";
                        $rg="";
                        $cpf="";
                        $dtnasc="";
                        $endereco="";
                        $telefone="";
                        $email="";
                        
		            $consultaAluno = new Aluno($id, $nome, $rg, $cpf, $dtnasc, $endereco, $email, $telefone);
                            $consultaAluno->ConsultarAluno($id, $nome, $rg, $cpf, $dtnasc, $endereco, $email, $telefone);
		        ?>
		    </div>
		</div>              
<?php include 'footer.php'; ?>