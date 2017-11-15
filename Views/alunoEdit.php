<?php
    session_start();
    require_once '../Model/init.php';
    require '../controllers/check.php';
    include '../controllers/buscarAluno.php';
    
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
                <h3 class="box-title">Editar Aluno</h3>
            </div>
            <div class="box-body">
                <form action="../controllers/editarAluno.php" method="POST"  align='middle'>
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input class="form-control" type="text" id="nome" name="nome"
                               value="<?php echo $user['nm_aluno']?>"/>
                    </div>
                    <div class="form-group">
                        <label for="rg">RG</label>
                        <input class="form-control" type="text" id="rg" name="rg"
                               value="<?php echo $user['registro_geral_aluno']?>"/>
                    </div>
                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input class="form-control" type="text" id="cpf" name="cpf" 
                               value="<?php echo $user['cpf_aluno']?>"/>
                    </div>
                    <div class="form-group">
                        <label for="dtnasc">Data de Nascimento</label>
                        <input class="form-control" type="date" id="dtnasc" name="dtnasc" 
                               value="<?php echo $user['dt_nascimento_aluno']?>"/>
                    </div>
                    <div class="form-group">
                        <label for="endereço">Endereço</label>
                        <input class="form-control" type="text" id="end" name="end"
                               value="<?php echo $user['nm_endereco']?>"/>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="text" id="email" name="email"
                               value="<?php echo $user['nm_email_aluno']?>"/>
                    </div>
                    <div class="form-group">
                        <label for="tel">Telefone</label>
                        <input class="form-control" type="text" id="tel" name="tel"
                               value="<?php echo $user['cd_telefone_aluno']?>"/>
                    </div>
                    <div class="form-group">
                        <label for="plan">Tipo de Plano</label>
                        <select name="plan" id="plan" class="form-control">
                            <option id="plan" class="form-control">Selecione...</option>
                                <?php
                                    $PDO = db_connect();
                                    $sql = "SELECT tipo_plano FROM plano ORDER BY tipo_plano ASC";
                                    $stmt = $PDO->prepare($sql);
                                    $stmt->execute();
                                while($plan = $stmt->fetch(PDO::FETCH_ASSOC)) {?>
                            <option <?php if($plan['tipo_plano']==$user['tipo_plano']){echo 'selected';} ?>
                                value="<?php echo $plan['tipo_plano'] ;?> "id="plan" class="form-control">
                            <?php echo $plan['tipo_plano'] ;?></option>
                            <?php  }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="moda">Modalidade</label>
                       <select name="moda" id="moda" class="form-control">
                             <option id="moda" class="form-control">Selecione...</option>
                             <?php
                                 $PDO = db_connect();
                                 $sql = "SELECT nm_modalidade FROM plano ORDER BY nm_modalidade ASC";
                                 $stmt = $PDO->prepare($sql);
                                 $stmt->execute();
                             while($plan = $stmt->fetch(PDO::FETCH_ASSOC)) {?>
                             <option <?php if($plan['nm_modalidade']==$user['nm_modalidade']){echo 'selected';} ?>
                                 value="<?php echo $plan['nm_modalidade'] ;?> "id="moda" class="form-control">
                             <?php echo $plan['nm_modalidade'];?></option>
                             <?php }?>
                         </select>
                    </div>
                    
                    <input type="hidden" name="id" value="<?php echo $id ?>"/>
                    
                    <label for="alterar"></label>        
                    <button class="btn btn-primary" id="alterar" >Salvar</button>
                </form>
                <a href="aluno.php"><button class="btn btn-primary" id="voltar" >Voltar</button></a>
            </div>
        </div>
  
    

<?php include ('footer.php'); ?>