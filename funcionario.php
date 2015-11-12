<?php 
    include_once("/globais/header.php");
    if(isset($_POST["nome"]) and isset($_POST["email"]) and isset($_POST["senha"])){
        funcionario($_POST["nome"], $_POST["email"], $_POST["senha"], $conexao);
    }
?>

    <h1>Cadastro de Funcionarios</h1>
    <form method="post">
        Nome:<input type="text" name="nome" class="nome" />
        Email :<input type="email" name="email" class="email" />
        Senha :<input type="password" name="senha" class="senha" />
        <input type="submit" value="cadastrar" class="tiny button">
    </form>

<?php include_once ("/globais/footer.php"); ?>