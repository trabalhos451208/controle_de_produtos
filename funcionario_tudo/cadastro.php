<?php 
    include_once("../globais/header.php");
    if(isset($_POST["nome"]) and isset($_POST["valor"]) and isset($_POST["quant"])){
        cadastrar($_POST["nome"], $_POST["valor"], $_POST["quant"], $_POST["data"], $conexao);
    }
?>

    <h1>Cadastro de Alimentos</h1>
    <form method="post">
        Nome:<input type="text" name="nome" class="nome" />
        Valor :<input type="text" name="valor" class="valor" />
        Quantidade :<input type="text" name="quant" class="quant" />
        Data de Validade :<input type="text" name="data" class="data" />
        <input type="submit" value="cadastrar" class="tiny button">
        <!--<button class="tiny button" onclick="showMe();" id="botao">cadastrar</button>-->
    </form>
    <br/>
    <table>
        <tr>
            <td>
                <form action="produtos.php">
                    <input type="submit" value="produtos" class="button">
                </form>
            </td>
            <td>
                <form action="/funcionario tudo/funcionario.php">
                    <input type="submit" value="novo funcionario" class="button">
                </form>
            </td>
        </tr>
    </table>
    
<?php include_once ("../globais/footer.php"); ?>