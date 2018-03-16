<?php
session_start();
require '../Model/init.php';
require '../controllers/check.php';
include '../controllers/buscarAluno.php';

if ($_SESSION['user_status'] == 1) {
    include ('header.php');
}
?>
<h2 class="center">RECIBO</h2>

<table class="table">
    <form action="enviarcomprovante.php" method="POST">
        <thead style="width: ;">
            <tr>
                <th scope="col">Nº</th>
                <th scope="col">R$ <?php echo $user['valormensalidade'] ?></th>
            </tr>
        </thead>
        <tbody>
        <td scope="row">Recebemos do Sr(a) <?php echo $user['nm_aluno'] ?></td>
        <td scope="row">Endereço: <?php echo $user['nm_endereco'] ?></td>
        <td scope="row">A importância de: </td>
        <td scope="row">Referente ao mês de: <?php echo $user['mesreferente'] ?></td>
        <td scope="row"></td>
        </tbody>
    </form>
</table>

<?php include ('footer.php'); ?>