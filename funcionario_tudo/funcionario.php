<?php 
    include_once("../globais/header.php");
    if(isset($_POST["nome"]) and isset($_POST["email"]) and isset($_POST["senha"])){
        
        if($_POST["permicao"] == "0"){
            ?> <script> alert("Permição não selecionada"); </script> <?php
        }elseif ($_POST["permicao"] == "1") {
            funcionario_editar($_POST["nome"], $_POST["email"], $_POST["senha"], $conexao);
        }elseif ($_POST["permicao"] == "2") {
            funcionario_inserir($_POST["nome"], $_POST["email"], $_POST["senha"], $conexao);
        }elseif ($_POST["permicao"] == "3") {
            funcionario_delete($_POST["nome"], $_POST["email"], $_POST["senha"], $conexao);
        }elseif ($_POST["permicao"] == "3"){
            funcionario($_POST["nome"], $_POST["email"], $_POST["senha"], $conexao);
        }
    }
?>

    <h1>Cadastro de Funcionarios</h1>
    <form method="post">
        Nome:<input type="text" name="nome" class="nome" />
        Email :<input type="email" name="email" class="email" />
        Senha :<input type="password" name="senha" class="senha" />
        Permição:
        <select name="permicao" >
            <option value="0" >selecione...</option>
            <option value="1" >editar</option>
            <option value="2" >inserir</option>
            <option value="3" >excluir</option>
            <option value="4" >Tudo</option>
        </select>
        <input type="submit" value="cadastrar" class="tiny button">
    </form>

<?php include_once ("../globais/footer.php"); ?>