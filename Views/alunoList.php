<?php
    session_start();
    require_once '../Model/init.php';
    require '../Classes/Aluno.class.php';
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
            	<div class="mensagem"></div>
		      <?php
                        		            
                        $id="";
                        $nome="";
                        $rg="";
                        $cpf="";
                        $datanascimento="";
                        $endereco="";
                        $telefone="";
                        $email="";
                        $tipoplano="";
                        $modalidade="";
                        
		            $consultaAluno = new Aluno($id, $nome, $rg, $cpf,
                                $datanascimento, $endereco, $telefone, $email,
                                $tipoplano, $modalidade);
                            $consultaAluno->ConsultarAluno($id, $nome, $rg, $cpf,
                                $datanascimento, $endereco, $telefone, $email,
                                $tipoplano, $modalidade);
		        ?>
            </div>
        </div>              
<?php include 'footer.php'; ?>