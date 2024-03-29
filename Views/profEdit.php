<?php
session_start();
require_once '../Model/init.php';
require '../controllers/check.php';
include ('../controllers/buscarProfessor.php');
include ('header.php');
?>
<h2 class="center">Sistema de Gerenciamento de Academia</h2>

<div class="box box-solid box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Editar Professor</h3>
    </div>
    <div class="box-body">
        <form action="../controllers/editarProfessor.php" method="POST"  align='middle'>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input class="form-control" type="text" id="nome" name="nome"
                       value="<?php echo $user['nm_professor'] ?>"/>
            </div>
            <div class="form-group">
                <label for="rg">RG</label>
                <input class="form-control" type="text" id="rg" name="rg"
                       value="<?php echo $user['registro_geral_professor'] ?>"/>
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input class="form-control" type="text" id="cpf" name="cpf" 
                       value="<?php echo $user['cpf_professor'] ?>"/>
            </div>
            <div class="form-group">
                <label for="dtnasc">Data de Nascimento</label>
                <input class="form-control" type="date" id="dtnasc" name="dtnasc" 
                       value="<?php echo $user['dt_nascimento_professor'] ?>"/>
            </div>
            <div class="form-group">
                <label for="endereço">Endereço</label>
                <input class="form-control" type="text" id="end" name="end"
                       value="<?php echo $user['nm_endereco'] ?>"/>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="text" id="email" name="email"
                       value="<?php echo $user['nm_email_professor'] ?>"/>
            </div>
            <div class="form-group">
                <label for="tel">Telefone</label>
                <input class="form-control" type="text" id="tel" name="tel" placeholder="Telefone"
                       value="<?php echo $user['cd_telefone_professor'] ?>"/>
            </div>
            <div class="form-group">
                <label for="moda">Modalidade</label>
                <select name="moda" id="moda" class="form-control">
                    <option id="moda" class="form-control"><?php echo $user['nm_modalidade'] ?></option>
                    <?php
                    $PDO = db_connect();
                    $sql = "SELECT nm_modalidade FROM modalidade ORDER BY nm_modalidade ASC";
                    $stmt = $PDO->prepare($sql);
                    $stmt->execute();
                    while ($plan = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <option <?php if ($plan['nm_modalidade'] == $user['nm_modalidade']) {
                        echo 'selected';
                    } ?>
                            value="<?php echo $plan['nm_modalidade']; ?> "id="moda" class="form-control">
    <?php echo $plan['nm_modalidade']; ?></option>
<?php } ?>
                </select>
            </div>

            <input type="hidden" name="id" value="<?php echo $id ?>"/>
            <label for="alterar"></label>        
            <button class="btn btn-primary" id="alterar" >Salvar</button>
        </form>
        <a href="professor.php"><button class="btn btn-primary" id="voltar" >Voltar</button></a>
    </div>
</div>
<?php include ('footer.php'); ?>