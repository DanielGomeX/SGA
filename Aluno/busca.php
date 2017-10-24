<?php
    require_once '../Model/init.php';
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
            $nome = $_POST['cxnome'];
            $pesquisa = $_POST['buscar'];
            
            $PDO = db_connect();
            if(isset($pesquisa)&&!empty($nome)){
            $stmt = $PDO->prepare("SELECT * FROM aluno
                                            WHERE nm_aluno
                                            LIKE :letra");
           
            $stmt->bindValue(':letra', '%'.$nome.'%', PDO::PARAM_STR);
            $stmt->execute();
            $resultados = $stmt->rowCount();

            if($resultados>=1){
                echo "Resultado(s) encontrado(s): ".$resultados."<br /><br />";
                echo "<table border='1' bgcolor='white'>";
                 echo'<thead>';
                  echo'<tr>';
                      echo '<th>Nome:</th>';
                      echo '<th>CPF:</th>';
                      echo '<th>RG:</th>';
                      echo '<th>Endereço:</th>';
                      echo '<th>Data de Nascimento:</th>';
                      echo '<th>Telefone</th>';
                      echo '<th>Email:</th>';
                  echo '</tr>';
              echo '</thead>';
              echo '<tbody>';
                while($reg = $stmt->fetch(PDO::FETCH_OBJ)){
              echo '<tr>';
                echo '<td>'.$reg->nm_aluno.'</td>';
                echo '<td>'.$reg->cpf_aluno.'</td>';
                echo '<td>'.$reg->registro_geral_aluno.'</td>';
                echo '<td>'.$reg->nm_endereco.'</td>';
                echo '<td>'. date("d/m/Y", strtotime($reg->dt_nascimento_aluno)).'</td>';
                echo '<td>'.$reg->cd_telefone_aluno.'</td>';
                echo '<td>'.$reg->nm_email_aluno.'</td>';
                echo '</table>';
                echo "<a href='index.php')><button >Voltar</button></a> ";
                }
                }else{
                    echo "Não existe usuario cadastrado";
                    echo "</br><a href='index.php')><button>Voltar</button></a> ";
                }
                }
                else{
                    echo "Preencha o campo de pesquisa";
                    echo "</br><a href='index.php')><button >Voltar</button></a> ";
                }
        ?>              
        </center>
      </body>
</html>