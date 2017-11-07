<?php
    session_start();
    require_once '../Model/init.php';
    require_once '../controllers/header.php';
    include '../Classes/Pagamento.class.php';
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
                        		            
                        $cdpagamento="";
                        $mesreferente="";
                        $datavencimento="";
                        $valormensalidade="";
                        
		            $consultapagamento = new Pagamento($cdpagamento, $mesreferente, $datavencimento, $valormensalidade);
                            $consultapagamento->ConsultarPagamento($cdpagamento, $mesreferente, $datavencimento, $valormensalidade);
		        ?>
		    </div>
		</div>              
<?php include 'footer.php'; ?>