<?php 
    include_once("../globais/header.php"); 
//    print_r($_POST);
    if(isset($_POST['id'])){
        $id = $_POST["id"];
        excluir($id, $conexao);
    }
?>
    <fieldset>
        <form method="post" action="busca.php">
            <table>
                <tr>
                    <td><input type="text" name="busca" id="busca" /></td>
                    <td><input type="submit" name="buscar" value="buscar" id="buscar" class="button tiny"/></td>
                </tr>
            </table>
        </form>
    </fieldset>
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
                <?php mostrar_todos($conexao); ?>
            </table>
        </div>
    </fieldset>

    <form action="/todos/login.php">
        <input type="submit" value="logar" class="button">
    </form>

<?php include_once ("../globais/footer.php"); ?>