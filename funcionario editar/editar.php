<?php include_once("/globais/header.php"); ?>

    <fieldset>
        <div class="lista">
            <table>
                <tr>
                    <td>Nome</td>
                    <td>Valor</td>
                    <td>Quantidade</td>
                    <td>Data de Validade</td>
                    <td>Editar</td>
                </tr>
                <?php 
                    if(isset($_POST["idp"])){
                        editarS($_POST["idp"], $conexao);
                        
                    }
//                    print_r($_POST);
                    if(isset($_POST["nome"]) and isset($_POST["valor"]) and isset($_POST["quant"]) and isset($_POST["idpr"])){
                        editar($_POST["idpr"], $_POST["nome"], $_POST["valor"], $_POST["quant"], $_POST["data"], $conexao);
//                        print_r($_POST);
                    }
                ?>
            </table>
        </div>
    </fieldset>
    <form action="produtos.php">
        <input type="submit" value="inicio" class="button" />
    </form>
    

<?php include_once ("/globais/footer.php"); ?>