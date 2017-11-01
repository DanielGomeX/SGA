<?php
    require_once '../Model/init.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulario de Cadastro</title>
     <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <center>
    <h1>Sistema de Gerenciamento de Academia</h1>
   
    
    <form action="add.php" method="POST"  align='middle'>
        
        <h2>Cadastrar Modalidade</h2><br/><br/>
        
        <label for="professormoda" class="cadastromoda">Nome do Professor:</label>
        <select name="professor" id="professormoda">
            <option>Selecione...</option>
            <?php 
                $PDO = db_connect();
                $listar = "SELECT nm_professor
                          FROM professor
                          ORDER BY nm_professor ASC";
                foreach($PDO->query($listar) as $dado){
                    
                 echo "<option value='".$dado['nm_professor']."'>".$dado['nm_professor']."</option>";
                }    
            ?>
        </select>
        
        <label for="nomemoda" class="cadastromoda">Modalidade:  </label>
        <select name="modalidade" id="nomemoda">
                            <option>Selecione...</option>
                            <option value="Muay Thai">Muay Thai</option>
                            <option value="Taekwondo">Taekwondo</option>
                            <option value="Jiu-Jitsu">Jiu-Jitsu</option>
                            <option value="MMA">MMA</option>
                          </select>
                         <span class="style1">      </span><br/><br/>
       
        <label for="quantidadedaula" class="cadastromoda">Qtd Aula Semanal:</label>
                            <select name="qtaula" id="quantidadedaula">
                            <option>Selecione...</option>
                            <option value="1">1 Aula</option>
                            <option value="2">2 Aulas</option>
                            <option value="3">3 Aulas</option>
                            <option value="4">4 Aulas</option>
                            <option value="5">5 Aulas</option>
                            <option value="6">6 Aulas</option>
                            <option value="7">7 Aulas</option>
                            <option value="8">8 Aulas</option>
                            <option value="9">9 Aulas</option>
                            <option value="10">10 Aulas</option>
                          </select>
                            <span class="style1">      </span><br/><br/>
        
        <label for="hraula" class="cadastromoda">Quantidade Hora Aula:</label>
                            <select name="hraula" id="hraula">
                            <option>Selecione...</option>
                            <option value="1">1 Hora</option>
                            <option value="2">2 Horas</option>
                            <option value="3">3 Horas</option>
                          </select>
                        <span class="style1">      </span><br/><br/>
        
                        
        <label for="alterar" class="cadastrofunc"></label>
        <button id="salvar" >Salvar</button>
        <button id="voltar" formaction="index.php">Voltar</button>
    </form>
    </center>
</body>
</html>
