<?php
    session_start();
    require_once '../Model/init.php';
    require '../controllers/check.php';
    include '../controllers/buscarProfessor.php';
    
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
                <h3 class="box-title">Dados Cadastrais do Professor</h3>
            </div>
            <div class="box-body">
                <form align='middle'>
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input class="form-control" type="text" id="nome" name="nome"
                               value="<?php echo $user['nm_professor']?>" readonly="true"/>
                    </div>
                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input class="form-control" type="text" id="cpf" name="cpf" 
                               value="<?php echo $user['cpf_professor']?>" readonly="true"/>
                    </div>
                    <div class="form-group">
                        <label for="rg">RG</label>
                        <input class="form-control" type="text" id="rg" name="rg"
                               value="<?php echo $user['registro_geral_professor']?>" readonly="true"/>
                    </div>
                    <div class="form-group">
                        <label for="endereço">Endereço</label>
                        <input class="form-control" type="text" id="end" name="end"
                               value="<?php echo $user['nm_endereco']?>" readonly="true"/>
                    </div>
                    <div class="form-group">
                        <label for="dtnasc">Data de Nascimento</label>
                        <input class="form-control" type="date" id="dtnasc" name="dtnasc" 
                               value="<?php echo $user['dt_nascimento_professor']?>" readonly="true"/>
                    </div>
                    <div class="form-group">
                        <label for="tel">Telefone</label>
                        <input class="form-control" type="text" id="tel" name="tel"
                               value="<?php echo $user['cd_telefone_professor']?>" readonly="true"/>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="text" id="email" name="email"
                               value="<?php echo $user['nm_email_professor']?>" readonly="true"/>
                    </div>
                    <div class="form-group">
                    <label for="moda">Modalidade</label>
                    <input class="form-control" type="text" id="moda" name="moda"
                               value="<?php echo $user['nm_modalidade']?>" readonly="true"/>
                    </div>
                    
                    <input type="hidden" name="id" value="<?php echo $id ?>"/>
                    
                    <label for="alterar"></label>        
                    <button class="btn btn-primary" id="alterar" formaction="profEdit.php?id=<?php echo $id;?>">Editar</button>
                    <button class="btn btn-primary" id="salvar" formaction="professor.php">Voltar</button>
                </form>
            </div>
        </div>
  
    

<?php include ('footer.php'); ?>