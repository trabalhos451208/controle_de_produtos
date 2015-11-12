<?php include_once("/globais/header.php"); ?>

    <h1><center>SM Alimenticios</center></h1>
    
    <h1>Login</h1>
    <form method="post">
        Nome:<input type="text" name="nome" class="nome" placeholder="Nome" />
        Senha :<input type="password" name="senha" class="senha" placeholder="Senha" />
        <input type="submit" value="logar" class="tiny button">
    </form>
    
    <form action="funcionario.php">
        <input type="submit" value="novo funcionario" class="button">
    </form>

<?php include_once ("/globais/footer.php"); ?>