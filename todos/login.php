<?php 
    include_once("../globais/header.php");
    
    if(
        isset($_POST["nome"]) and
        isset($_POST["senha"])
    ){
        login($_POST["nome"], $_POST["senha"], $conexao);
    }
?>

    <h1><center>SM Alimenticios</center></h1>
    
    <h1>Login</h1>
    <form method="post">
        Nome:<input type="text" name="nome" class="nome" placeholder="Nome" />
        Senha :<input type="password" name="senha" class="senha" placeholder="Senha" />
        <input type="submit" value="logar" class="tiny button">
    </form>
    
    <br/>
    <br/>
    <br/>
    <form action="/todos/index.php">
        <input type="submit" value="voltar" class="button">
    </form>
    
<?php include_once ("../globais/footer.php"); ?>