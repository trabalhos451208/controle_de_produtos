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