<?php
    require_once '../Model/init.php';
    require_once '../Classes/Modalidade.class.php';
?>
<!DOCTYPE html>
<html>
    <head>
         <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../dist/css/style.css" rel="stylesheet" type="text/css" />
        <link href="../dist/css/barramenu.css" rel="stylesheet" type="text/css" />
        <title>Busca Professor</title>
    </head>
        <body>
        <center>
        <h1>SISTEMA DE GERENCIAMENTO DE ACADEMIA</h1>

        <h2>Resultado da busca</h2>
            <?php
            $id="";
            $nome="";
            $rg="";
            $cpf="";
            $datanascimento="";
            $endereco="";
            $telefone="";
            $email="";
            
                $consultar = new Modalidade($cdModalidade, $nomemodalidade, $qtAulaSemanal, $nomeProfessor, $qtHorasAula);
                $consultar->ConsultarModalidade($cdModalidade, $nomemodalidade, $qtAulaSemanal, $nomeProfessor, $qtHorasAula);
            ?>
        </center>
      </body>
</html>