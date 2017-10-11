<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="CadastrarPlano.php" method="post">
            <p>Informe o tipo de Plano:</p>
            <input type="radio" name="plano" value="mensal"/> Mensal<br />
            <input type="radio" name="plano" value="trimestral"/> Trimestral<br />
            <input type="radio" name="plano" value="semestral"/> Semestral<br />
            <input type="radio" name="plano" value="anual"/> Anual<br />
            
            <p>Informe a forma de Pagamento:</p>
            <input type="radio" name="pagamento" value="dinheiro"/> Dinheiro<br />
            <input type="radio" name="pagamento" value="cheque"/> Cheque<br />
            <input type="radio" name="pagamento" value="cartao"/> Cartão<br />
            
            <p>Informe a Modalidade</p>
            <input type="checkbox" name="opcoes" value="jiujitsu"/> JiuJitsu<br />
            <input type="checkbox" name="opcoes" value="mma"/> MMA<br />
            <input type="checkbox" name="opcoes" value="taekwondo"/> Taekwondo<br />
            <input type="checkbox" name="opcoes" value="muaythai"/> Muay Thai<br />
            
            <input type="submit" name="salvar" value="Salvar">
            <input type="reset" name="limpar" value="Limpar">
            <input type="submit" name="voltar" value="Voltar">
        </form>
        
    </body>
</html>
