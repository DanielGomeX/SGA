<?php
    require 'init.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulario de Cadastro</title>
     <link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    
    <h1>Sistema de Gerenciamento de Academia</h1>
   
    
    <form action="add.php" method="POST"  align='middle'>
        
        <h2>Cadastrar Modalidade</h2><br/><br/>
        
        <label for="professormoda" class="cadastromoda">Nome do Professor:</label>
        <input type="text" id="profmoda" placeholder="Professor"/> <br/><br/>
        
        <label for="nomemoda" class="cadastromoda">Modalidade:  </label>
        <select name="modalidade" id="moda">
                            <option>Selecione...</option>
                            <option value="Muay Thai">Muay Thai</option>
                            <option value="Taekwondo">Taekwondo</option>
                            <option value="Jiu-Jitsu">Jiu-Jitsu</option>
                            <option value="MMA">MMA</option>
                          </select>
                         <span class="style1">      </span><br/><br/>
       
        
        <label for="quantidadedaula" class="cadastromoda">Qtd Aula Semanal:</label>
                            <select name="qaula" id="hraula">
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
                            <select name="haula" id="hraula">
                            <option>Selecione...</option>
                            <option value="1">1 Hora</option>
                            <option value="2">2 Horas</option>
                            <option value="3">3 Horas</option>
                          </select>
                        <span class="style1">      </span><br/><br/>
        
       
        <label for="salvar" class="ccadastromoda"></label>
        <input type="submit" id="salvar" value="Salvar" /> 
        <input type="submit" name="voltar" value="Voltar" formaction="index.php" /> <br/>
    </form>
</body>
</html>
