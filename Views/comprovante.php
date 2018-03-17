<?php
session_start();
require '../Model/init.php';
require '../controllers/check.php';
//include '../controllers/buscarAluno.php';

if ($_SESSION['user_status'] == 1) {
    include ('header.php');
}
?>
<h2 class="center">RECIBO</h2>

<table class="table">
    <form action="enviarcomprovante.php" method="POST">

        <div class="form-group row">
            <div class="col-xs-2">
                <label for="ex1">Nº</label>
                <input class="form-control" id="ex1" type="text" name="numerorecibo">
            </div>

            <div class="col-xs-2">
                <label for="ex1">R$</label>
                <input class="form-control" id="ex1" type="text"  name="valorrecibo" value="<?php echo $user['valormensalidade'] ?>">
            </div>
         </div>
        
        <div class="form-group row">
            <div class="col-xs-4">
                <label for="ex1">Recebemos do Sr(a):</label>
                <input class="form-control" id="ex1" type="text" name="nomealuno" value="<?php echo $user['nm_aluno'] ?>">
            </div>

            <div class="col-xs-4">
                <label for="ex1">Endereço:</label>
                <input class="form-control" id="ex1" type="text"  name="endereco" value="<?php echo $user['nm_endereco'] ?>">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-xs-2">
                <label for="ex1">A importância de :</label>
                <input class="form-control" id="ex1" type="text"  name="endereco" value="<?php echo $user['vl_mensalidade'] ?>">
            </div>
            
            <div class="col-xs-2">
                <label for="ex1">Referente ao mês de:</label>
                <input class="form-control" id="ex1" type="text"  name="mesreferente" value="<?php echo $user['mesreferente'] ?>">
            </div>
            
            <div class="col-xs-3">
                <label for="ex1">.</label>
                <input class="form-control" id="ex1" type="text"  name="mesreferente" value="<?php
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        echo ucwords(utf8_encode(strftime('%A, %d de %B de %Y', strtotime('today'))));
        ?>">
            </div>
         </div>
    </form>
</table>
<a href="pagamento.php"><button class="btn btn-primary" id="voltar" >Voltar</button></a>
<?php include ('footer.php'); ?>