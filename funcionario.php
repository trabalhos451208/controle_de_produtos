<?php include_once("/globais/header.php"); ?>

    <h1>Cadastro de Funcionarios</h1>
    <form method="post">
        Nome:<input type="text" name="nome" class="nome" />
        Email :<input type="email" name="email" class="email" />
        Senha :<input type="password" name="senha" class="senha" />
        Senha Do gerente :<input type="password" name="SenhaG" class="SenhaG" />
        <input type="submit" value="cadastrar" class="tiny button">
    </form>

<?php include_once ("/globais/footer.php"); ?>