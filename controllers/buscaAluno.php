<?php
    require_once '../Model/init.php';
    require_once '../Classes/Aluno.class.php';
?>
<!DOCTYPE html>
<html>
    <head>
         <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/style.css" rel="stylesheet" type="text/css" />
        <link href="../css/barramenu.css" rel="stylesheet" type="text/css" />
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
            
                $consultar = new Aluno($id,$nome,$rg,$cpf,
                        $datanascimento,$endereco,$telefone,$email);
                $consultar->ConsultarAluno($id,$nome,$rg,$cpf,
                        $datanascimento,$endereco,$telefone,$email);
            ?>
        </center>
      </body>
</html>