<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Excluir Plano</title>
    </head>
    <body>
       <form>
            <fieldset>
                <legend>Selecione o Plano a ser excluído</legend>
                <select name="plano">
                    <option>Mensal</option>
                    <option>Trimestral</option>
                    <option>Semestral</option>
                    <option>Anual</option>
                </select>
                <select name="pagamento">
                    <option>Dinheiro</option>
                    <option>Cheque</option>
                    <option>Cartão</option>
                </select>
                <select name="modalidade">
                    <option>JiuJitsu</option>
                    <option>MMA</option>
                    <option>Taekwondo</option>
                    <option>Muay Tai</option>
                </select>
            </fieldset><br>
            <input type="submit" name="excluir" value="Excluir">
            <input type="submit" name="voltar" value="Voltar">
        </form>
    </body>
</html>
