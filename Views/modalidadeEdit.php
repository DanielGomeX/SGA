<?php
session_start();
require_once '../Model/init.php';
require '../controllers/check.php';
include ('../controllers/buscarModalidade.php');
include ('header.php');
?>
<h2 class="center">Sistema de Gerenciamento de Academia</h2>
<div class="box box-solid box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Editar Modalidade</h3>
    </div>
    <div class="box-body">
        <div class="mensagem"><?php if (isset($msg)) {
    echo $msg;
} ?></div>
        <form action="../controllers/editarModalidade.php?cd_modalidade=<?php echo $user['cd_modalidade'] ?>" method="POST"  align='middle'>
            <div class="form-group">
                <label for="nomemodalidade">Nome da modalidade</label>
                <input class="form-control" type="text" id="nomemodalidade" value="<?php echo $user['nm_modalidade']; ?>" name="nomemodalidade"/>
            </div>
            <div class="form-group">
                <label for="qtaulassemana">Quantidade de aulas por semana</label>
                <input class="form-control" type="number" min="1" max="5" id="qtaulassemana" name="qtaulassemana" value="<?php echo $user['qt_aulasem'] ?>">

            </div>
            <div class="form-group">
                <label for="professor">Nome do professor</label>
                <select name="professor" class="form-control" id="professor">
                    <option><?php echo $user['nm_professor'] ?></option>
                    <?php
                    $PDO = db_connect();
                    $sql = "SELECT nm_professor FROM professor ORDER BY nm_professor ASC";
                    $stmt = $PDO->prepare($sql);
                    $stmt->execute();
                    while ($nmprof = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <option  value="<?php echo $nmprof['nm_professor'] ?>">
    <?php echo $nmprof['nm_professor'] ?></option>
<?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="quthorasaula">Quantidade de horas/aula</label>
                <input class="form-control" type="number" min="1" max="5" id="qthorasaula" name="qthorasaula" value="<?php echo $user['qt_hraula'] ?>">
            </div>
            <input type="hidden" name="id" value="<?php echo $cd_modalidade ?>"/>
            <label for="salvar"></label>
            <button class="btn btn-primary" id="salvar" >Salvar</button>
        </form>
        <a href="modalidade.php"><button class="btn btn-primary" id="voltar" >Voltar</button></a>
    </div>
</div>
<?php include 'footer.php'; ?>