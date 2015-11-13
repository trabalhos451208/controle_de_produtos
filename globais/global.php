<?php

/** Banco De Dados **/

$host = "127.0.0.1:3307";
$database = "cadastro";
$user = "root";
$password = "usbw";

$conexao = new PDO("mysql:host={$host};dbname={$database}", $user, $password);

/** Fim do banco de dados **/

/**Funções do Sistema**/
    
    function cadastrar($nome, $valor, $quant, $data, $conexao){
        $sql = "INSERT INTO produto (nome, valor, quant, data) values(:nome, :valor, :quant, :data);";
        $prepare = $conexao->prepare($sql);
        $prepare->bindValue(":nome", $nome);
        $prepare->bindValue(":valor", $valor);
        $prepare->bindValue(":quant", $quant);
        $prepare->bindValue(":data", $data);
        $prepare->execute();
        
        $sqlp = "INSERT INTO historico (nome, valor, quant, data) values(:nome, :valor, :quant, :data);";
        $preparo = $conexao->prepare($sqlp);
        $preparo->bindValue(":nome", $nome);
        $preparo->bindValue(":valor", $valor);
        $preparo->bindValue(":quant", $quant);
        $preparo->bindValue(":data", $data);
        $preparo->execute();
    }
    
    /**Mostram os itens**/
    
    function mostrar($conexao){
        $sql = "SELECT * FROM `produto`;";
        $prepare = $conexao->prepare($sql);
        $prepare->execute();
        
        while ($linha = $prepare->fetch(PDO::FETCH_ASSOC)){
        ?>
            <tr>
                <td><?php echo $linha["idproduto"]; ?></td>
                <td><?php echo $linha["nome"]; ?></td>
                <td><?php echo $linha["valor"]; ?></td>
                <td><?php echo $linha["quant"]; ?></td>
                <td><?php echo $linha["data"]; ?></td>
                <td>
                    <form method="post">
                        <input type="submit" class="tiny button" value="excluir" id="excluir" />
                        <input type="hidden" name="id" value="<?php echo $linha["idproduto"]; ?>" />
                    </form>
                </td>
                <td>
                    <form method="post" action="editar.php">
                        <input type="submit" class="tiny button" value="editar" id="editar" />
                        <input type="hidden" name="idp" value="<?php echo $linha["idproduto"]; ?>" />
                    </form>
                </td>
            </tr>
        <?php
        }
    }
    
    function mostrar_todos($conexao){
        $sql = "SELECT * FROM `produto`;";
        $prepare = $conexao->prepare($sql);
        $prepare->execute();
        
        while ($linha = $prepare->fetch(PDO::FETCH_ASSOC)){
        ?>
            <tr>
                <td><?php echo $linha["idproduto"]; ?></td>
                <td><?php echo $linha["nome"]; ?></td>
                <td><?php echo $linha["valor"]; ?></td>
                <td><?php echo $linha["quant"]; ?></td>
                <td><?php echo $linha["data"]; ?></td>
            </tr>
        <?php
        }
    }
    
    function mostrar_editar($conexao){
        $sql = "SELECT * FROM `produto`;";
        $prepare = $conexao->prepare($sql);
        $prepare->execute();
        
        while ($linha = $prepare->fetch(PDO::FETCH_ASSOC)){
        ?>
            <tr>
                <td><?php echo $linha["idproduto"]; ?></td>
                <td><?php echo $linha["nome"]; ?></td>
                <td><?php echo $linha["valor"]; ?></td>
                <td><?php echo $linha["quant"]; ?></td>
                <td><?php echo $linha["data"]; ?></td>
                <td>
                    <form method="post" action="editar.php">
                        <input type="submit" class="tiny button" value="editar" id="editar" />
                        <input type="hidden" name="idp" value="<?php echo $linha["idproduto"]; ?>" />
                    </form>
                </td>
            </tr>
        <?php
        }
    }
    
    function mostrar_excluir($conexao){
        $sql = "SELECT * FROM `produto`;";
        $prepare = $conexao->prepare($sql);
        $prepare->execute();
        
        while ($linha = $prepare->fetch(PDO::FETCH_ASSOC)){
        ?>
            <tr>
                <td><?php echo $linha["idproduto"]; ?></td>
                <td><?php echo $linha["nome"]; ?></td>
                <td><?php echo $linha["valor"]; ?></td>
                <td><?php echo $linha["quant"]; ?></td>
                <td><?php echo $linha["data"]; ?></td>
                <td>
                    <form method="post">
                        <input type="submit" class="tiny button" value="excluir" id="excluir" />
                        <input type="hidden" name="id" value="<?php echo $linha["idproduto"]; ?>" />
                    </form>
                </td>
            </tr>
        <?php
        }
    }
    
    /**função deletar**/
    function excluir($id, $conexao){
        $sql = "DELETE FROM `produto`WHERE idproduto=:id;";
        $prepare = $conexao->prepare($sql);
        $prepare->bindValue(":id", $id);
        $prepare->execute();
    
    }
    
    /**função editarS: selecionar para a edição**/
    function editarS($id, $conexao){
        $sql = "SELECT `idproduto`, `nome`, `valor`, `quant`, `data` FROM `produto` WHERE `idproduto`=:id;";
        $prepare = $conexao->prepare($sql);
        $prepare->bindValue(":id", $id);
        $prepare->execute();
        while ($linha = $prepare->fetch(PDO::FETCH_ASSOC)){
        ?>
            <form method="post" action="editar.php">
                <tr>
                    <td><input value="<?php echo $linha["nome"]; ?>" type="text" name="nome" class="nome" /></td>
                    <td><input value="<?php echo $linha["valor"]; ?>" type="text" name="valor" class="valor" /></td>
                    <td><input value="<?php echo $linha["quant"]; ?>" type="text" name="quant" class="quant" /></td>
                    <td><input value="<?php echo $linha["data"]; ?>" type="text" name="data" class="data" /></td>
                    <td>
                        <input type="submit" class="tiny button" value="editar" id="editar" />
                        <input type="hidden" name="idpr" value="<?php echo $linha["idproduto"]; ?>" />
                    </td>
                </tr>
            </form>
        <?php
        }
    }
    
    /**função editar**/
    function editar($id, $nome, $valor, $quant, $data, $conexao){
        $sql = "UPDATE `produto` SET`nome`=:nome,`valor`=:valor,`quant`=:quant,`data`=:data WHERE `idproduto`=:id;";
        $prepare = $conexao->prepare($sql);
        $prepare->bindValue(":id", $id);
        $prepare->bindValue(":nome", $nome);
        $prepare->bindValue(":valor", $valor);
        $prepare->bindValue(":quant", $quant);
        $prepare->bindValue(":data", $data);
        $prepare->execute();
    }
    
    function busca($nome, $valor, $conexao){
        $sql = "select * from produto where nome=:nome or valor=:valor";
        $prepare = $conexao->prepare($sql);
        $prepare->bindValue(":nome", $nome);
        $prepare->bindValue(":valor", $valor);
        $prepare->execute();
        while ($linha = $prepare->fetch(PDO::FETCH_ASSOC)){
        ?>
            <tr>
                <td><?php echo $linha["idproduto"]; ?></td>
                <td><?php echo $linha["nome"]; ?></td>
                <td><?php echo $linha["valor"]; ?></td>
                <td><?php echo $linha["quant"]; ?></td>
                <td><?php echo $linha["data"]; ?></td>
                <td>
                    <form method="post">
                        <input type="submit" class="tiny button" value="excluir" id="excluir" />
                        <input type="hidden" name="id" value="<?php echo $linha["idproduto"]; ?>" />
                    </form>
                </td>
                <td>
                    <form method="post" action="editar.php">
                        <input type="submit" class="tiny button" value="editar" id="editar" />
                        <input type="hidden" name="idp" value="<?php echo $linha["idproduto"]; ?>" />
                    </form>
                </td>
            </tr>
        <?php
        }
    }
    
    function busca_editar($nome, $valor, $conexao){
        $sql = "select * from produto where nome=:nome or valor=:valor";
        $prepare = $conexao->prepare($sql);
        $prepare->bindValue(":nome", $nome);
        $prepare->bindValue(":valor", $valor);
        $prepare->execute();
        while ($linha = $prepare->fetch(PDO::FETCH_ASSOC)){
        ?>
            <tr>
                <td><?php echo $linha["idproduto"]; ?></td>
                <td><?php echo $linha["nome"]; ?></td>
                <td><?php echo $linha["valor"]; ?></td>
                <td><?php echo $linha["quant"]; ?></td>
                <td><?php echo $linha["data"]; ?></td>
                <td>
                    <form method="post" action="editar.php">
                        <input type="submit" class="tiny button" value="editar" id="editar" />
                        <input type="hidden" name="idp" value="<?php echo $linha["idproduto"]; ?>" />
                    </form>
                </td>
            </tr>
        <?php
        }
    }
    
    function busca_excluir($nome, $valor, $conexao){
        $sql = "select * from produto where nome=:nome or valor=:valor";
        $prepare = $conexao->prepare($sql);
        $prepare->bindValue(":nome", $nome);
        $prepare->bindValue(":valor", $valor);
        $prepare->execute();
        while ($linha = $prepare->fetch(PDO::FETCH_ASSOC)){
        ?>
            <tr>
                <td><?php echo $linha["idproduto"]; ?></td>
                <td><?php echo $linha["nome"]; ?></td>
                <td><?php echo $linha["valor"]; ?></td>
                <td><?php echo $linha["quant"]; ?></td>
                <td><?php echo $linha["data"]; ?></td>
                <td>
                    <form method="post">
                        <input type="submit" class="tiny button" value="excluir" id="excluir" />
                        <input type="hidden" name="id" value="<?php echo $linha["idproduto"]; ?>" />
                    </form>
                </td>
            </tr>
        <?php
        }
    }
    
    function busca_todos($nome, $valor, $conexao){
        $sql = "select * from produto where nome=:nome or valor=:valor";
        $prepare = $conexao->prepare($sql);
        $prepare->bindValue(":nome", $nome);
        $prepare->bindValue(":valor", $valor);
        $prepare->execute();
        while ($linha = $prepare->fetch(PDO::FETCH_ASSOC)){
        ?>
            <tr>
                <td><?php echo $linha["idproduto"]; ?></td>
                <td><?php echo $linha["nome"]; ?></td>
                <td><?php echo $linha["valor"]; ?></td>
                <td><?php echo $linha["quant"]; ?></td>
                <td><?php echo $linha["data"]; ?></td>
            </tr>
        <?php
        }
    }
    
    /**Cadastro de funcionarios**/
    
    function funcionario($nome, $email, $senha, $conexao){
        $sql = "INSERT INTO `funcionario`(`nome`, `email`, `senha`) VALUES (:nome,:email,:senha);";
        $prepare = $conexao->prepare($sql);
        $prepare->bindValue(":nome", $nome);
        $prepare->bindValue(":email", $email);
        $prepare->bindValue(":senha", $senha);
        $prepare->execute();
    }
    
    function funcionario_editar($nome, $email, $senha, $conexao){
        $sql = "INSERT INTO `funcionario_editar`(`nome`, `email`, `senha`) VALUES (:nome,:email,:senha);";
        $prepare = $conexao->prepare($sql);
        $prepare->bindValue(":nome", $nome);
        $prepare->bindValue(":email", $email);
        $prepare->bindValue(":senha", $senha);
        $prepare->execute();
    }
    
    function funcionario_inserir($nome, $email, $senha, $conexao){
        $sql = "INSERT INTO `funcionario_insert`(`nome`, `email`, `senha`) VALUES (:nome,:email,:senha);";
        $prepare = $conexao->prepare($sql);
        $prepare->bindValue(":nome", $nome);
        $prepare->bindValue(":email", $email);
        $prepare->bindValue(":senha", $senha);
        $prepare->execute();
    }
    
    function funcionario_delete($nome, $email, $senha, $conexao){
        $sql = "INSERT INTO `funcionario_delete`(`nome`, `email`, `senha`) VALUES (:nome,:email,:senha);";
        $prepare = $conexao->prepare($sql);
        $prepare->bindValue(":nome", $nome);
        $prepare->bindValue(":email", $email);
        $prepare->bindValue(":senha", $senha);
        $prepare->execute();
    }
    
    /**Fim do cadastro de funcionarios**/
    
    /**Login dos funcionarios**/
    
    function login($nome, $senha, $conexao){
        
        /**Faz login do Funcionario chefe**/
        
        $sql = "SELECT `idfuncionario`, `nome`, `email`, `senha` FROM `funcionario` WHERE `nome`=:nome and `senha`=:senha;";
        $prepare = $conexao->prepare($sql);
        $prepare->bindValue(":nome", $nome);
        $prepare->bindValue(":senha", $senha);
        $prepare->execute();
        
        if($prepare->rowCount() == 1){
            header("Location: /funcionario_tudo/produtos.php");
            return;
        }
        
        /**Faz login do Funcionario_editar**/
        
        $sqle = "SELECT `idfuncionario_editar`, `nome`, `email`, `senha` FROM `funcionario_editar` WHERE `nome`=:nome and `senha`=:senha;";
        $prepare_editar = $conexao->prepare($sqle);
        $prepare_editar->bindValue(":nome", $nome);
        $prepare_editar->bindValue(":senha", $senha);
        $prepare_editar->execute();
//        print_r($_POST);
        if($prepare_editar->rowCount() == 1){
            print_r($_POST);
            header("Location: /funcionario_editar/produtos.php");
            
            return;
        }
        
        /**Faz login do Funcionario_insert**/
        
        $sqli = "SELECT `idfuncionario_insert`, `nome`, `email`, `senha` FROM `funcionario_insert` WHERE `nome`=:nome and `senha`=:senha;";
        $prepare_insert = $conexao->prepare($sqli);
        $prepare_insert->bindValue(":nome", $nome);
        $prepare_insert->bindValue(":senha", $senha);
        $prepare_insert->execute();
        
        if($prepare_insert->rowCount() == 1){
            header("Location: /funcionario_inserir/produtos.php");
            return;
        }
        
        /**Faz login do Funcionario_delete**/
        
        $sqld = "SELECT `idfuncionario_delete`, `nome`, `email`, `senha` FROM `funcionario_delete` WHERE `nome`=:nome and `senha`=:senha;";
        $prepare_delete = $conexao->prepare($sqld);
        $prepare_delete->bindValue(":nome", $nome);
        $prepare_delete->bindValue(":senha", $senha);
        $prepare_delete->execute();
        
        if($prepare_delete->rowCount() == 1){
            header("Location: /funcionario_excluir/produtos.php");
            return;
        }
    }
    
    /**Fim do login dos funcionarios**/