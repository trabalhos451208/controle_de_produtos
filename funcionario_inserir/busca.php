<?php include_once("../globais/header.php"); ?>

    <fieldset>
        <div class="lista">
            <table>
                <tr>
                    <td>Numero do produto</td>
                    <td>Nome</td>
                    <td>Valor</td>
                    <td>Quantidade</td>
                    <td>Data de Validade</td>
                </tr>
                <?php
                    
//                    $busca = $_POST["busca"];
                    if(isset($_POST["busca"])){
                        busca_todos($_POST["busca"], $_POST["busca"], $conexao);
                    }  
                ?>
            </table>
        </div>
    </fieldset>

    <form action="/funcionario_inserir/produtos.php">
        <input type="submit" value="voltar" class="button">
    </form>

<?php include_once ("../globais/footer.php"); ?>