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
                    <td>Deletar</td>
                </tr>
                <?php
                    
//                    $busca = $_POST["busca"];
                    if(isset($_POST["busca"])){
                        busca_excluir($_POST["busca"], $_POST["busca"], $conexao);
                    }  
                ?>
            </table>
        </div>
    </fieldset>

<?php include_once ("../globais/footer.php"); ?>