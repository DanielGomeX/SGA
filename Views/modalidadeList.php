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
                        		            
                        $cdModalidade="";
                        $nomemodalidade="";
                        $qtAulaSemanal="";
                        $nomeProfessor="";
                        $qtHorasAula="";
                        
		            $consultaAluno = new Modalidade($cdModalidade, $nomemodalidade, $qtAulaSemanal, $nomeProfessor, $qtHorasAula);
                            $consultaAluno->ConsultarModalidade($cdModalidade, $nomemodalidade, $qtAulaSemanal, $nomeProfessor, $qtHorasAula);
		        ?>
		    </div>
		</div>              
<?php include 'footer.php'; ?>