<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro do Plano</title>
    </head>
    <body>
        <form action="CadastrarPlano.php" method="post">
            <fieldset>
                <legend>Informe o tipo de Plano</legend>
                    <input type="radio" name="plano" value="mensal"/> Mensal<br />
                    <input type="radio" name="plano" value="trimestral"/> Trimestral<br />
                    <input type="radio" name="plano" value="semestral"/> Semestral<br />
                    <input type="radio" name="plano" value="anual"/> Anual<br />
            </fieldset><br>
            <fieldset>
                <legend>Informe a forma de Pagamento</legend>
                    <input type="radio" name="pagamento" value="dinheiro"/> Dinheiro<br />
                    <input type="radio" name="pagamento" value="cheque"/> Cheque<br />
                    <input type="radio" name="pagamento" value="cartao"/> Cartão<br />
            </fieldset><br>
            <fieldset>
                <legend>Informe a Modalidade</legend>
                    <input type="checkbox" name="opcoes" value="jiujitsu"/> JiuJitsu<br />
                    <input type="checkbox" name="opcoes" value="mma"/> MMA<br />
                    <input type="checkbox" name="opcoes" value="taekwondo"/> Taekwondo<br />
                    <input type="checkbox" name="opcoes" value="muaythai"/> Muay Thai<br />
            </fieldset><br>
            <input type="submit" name="salvar" value="Salvar">
            <input type="reset" name="limpar" value="Limpar">
            <input type="submit" name="voltar" value="Voltar">
            
        </form>
        
    </body>
</html>
