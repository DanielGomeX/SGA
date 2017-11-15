<?php
    session_start();
    require_once '../Model/init.php';
    require_once '../controllers/header.php';
    include '../Classes/Pagamento.class.php';
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
                <h3 class="box-title">Resultado da busca</h3>
            </div>
            <div class="box-body">
            	
		<?php
                  		            
                  $cdpagamento="";
                  $nomealuno="";
                  $modalidade="";
                  $mesreferente="";
                  $datavencimento="";
                  $valormensalidade="";
                  
                  
		$consultapagamento = new Pagamento($cdpagamento,
                 $nomealuno, $modalidade, $valormensalidade, $mesreferente, $datavencimento);
                $consultapagamento->ConsultarPagamento($cdpagamento,
                 $nomealuno, $modalidade, $valormensalidade, $mesreferente, $datavencimento);
		  ?>
		    </div>
		</div>              
<?php include 'footer.php'; ?>