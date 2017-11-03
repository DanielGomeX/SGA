<?php
    session_start();
    require_once '../Model/init.php';
    require_once '../controllers/check.php';
    
 
    //recupera o ID da URL
    $id = isset($_GET['id'])? (int) $_GET['id']: null;
       
    //valida o ID
    if(empty($id)){
        echo '</br><font color="red">ID para alteração não definido</font>';
        echo '<a href="index.php"> Voltar</a>';
        exit;
    }
    
    //recupera os dados do usuário a ser editado
    $PDO = db_connect();
    $sql = "SELECT nm_aluno,
            cpf_aluno,
            registro_geral_aluno,
            nm_endereco,
            dt_nascimento_aluno,
            cd_telefone_aluno,
            nm_email_aluno 
             FROM aluno
             WHERE matricula_aluno = '$id'";
    
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // se o método fetch() não retornar um array, significa
    // que o ID não corresponde a um usuário válido.
    if(!is_array($user)){
        echo '</br><font color="red">Nenhum Usuário encontrado</font>';
        echo '<a href="index.php"> Voltar</a>';
        exit;
    }
include ('../header.php');
?>
        <h2 class="center">Sistema de Gerenciamento de Academia</h2>
      
        <div class="box box-solid box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Aluno</h3>
            </div>
            <div class="box-body">
                <form action="edit.php" method="POST"  align='middle'>
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
                        <input class="form-control" type="text" id="tel" name="tel" placeholder="Telefone"
                               value="<?php echo $user['cd_telefone_aluno']?>"/>
                    </div>    
                    
                    <input type="hidden" name="id" value="<?php echo $id ?>"/>
                    
                    <label for="alterar"></label>        
                    <button class="btn btn-primary" id="alterar" >Salvar</button>
                    <button class="btn btn-primary" id="salvar" formaction="aluno.php">Voltar</button>
                </form>
            </div>
        </div>
  
    

<?php include ('footer.php'); ?>