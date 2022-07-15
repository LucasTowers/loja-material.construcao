<?php

$id = $_POST['item'];
$operacao = $_POST['operacao'];

include "../conexao.php";

$sql = "SELECT 
produto.descricao as nome,
produto.val_unitario as preco,
produto.especificacoes as sobre,
marca.descricao as marca,
marca.id as marcaId,
tipo.descricao as tipo,
tipo.id as tipoId
FROM produto
INNER JOIN marca ON marca.id = produto.marca
INNER JOIN tipo ON tipo.id = produto.tipo   
where produto.id = {$id}";

$result = mysqli_query($_conn, $sql);

$produto = mysqli_fetch_assoc($result);

?>



<div class="container">
    <form class="row g-3" method="POST" action="?pg=produto/produtoController.php">
    <input type="hidden" value="<?= $operacao ?>" name="operacao">
    <input type="hidden" value="<?= $id ?>" name="id">
        <div class="col-12">
            <label for="text" class="form-label">Nome do Produto:</label>
            <input type="text" class="form-control" id="descricao" name="descricao" value="<?php if(mysqli_num_rows($result) > 0){ echo("{$produto['nome']}");} ?>">
        </div>

        <div class="col-md-4">
            <label for="" class="form-label">Marca:</label>
            <select id="inputState" class="form-select" name="marca">
                <?php

                $sql2 = "select * from marca order by descricao";

                $result2 = mysqli_query($_conn, $sql2);

                while ($produto2 = mysqli_fetch_array($result2)) :
                ?>
                    <option value="<?= $produto2['id'] ?>" <?php if(mysqli_num_rows($result) > 0){ if($produto2['id'] == $produto['marcaId']){ echo("selected");} }?>><?= $produto2['descricao'] ?></option>
                <?php
                endwhile;
                ?>
            </select>
        </div>

        <div class="col-md-4">
            <label for="inputState" class="form-label">Tipo:</label>
            <select id="inputState" class="form-select" name="tipo">
                <?php

                $sql2 = "select * from tipo order by descricao";

                $result2 = mysqli_query($_conn, $sql2);

                while ($produto2 = mysqli_fetch_array($result2)) :
                ?>
                    <option value="<?= $produto2['id'] ?>"  <?php if(mysqli_num_rows($result) > 0){ if($produto2['id'] == $produto['tipoId']){ echo("selected");} }?> >  <?= $produto2['descricao'] ?></option>
                <?php
                endwhile;
                ?>
            </select>
        </div>

        <div class="col-md-4">
            <label for="text" class="form-label">Preço:</label>
            <input type="number" class="form-control" id="descricao" step="0.01" name="preco" value="<?= $produto['preco'] ?>">
        </div>
        
        <div class="col-12">
            <label for="text" class="form-label">Especificacao:</label>
            <textarea name="especificacao" id="" class="form-control" name="especificacao"><?php if(mysqli_num_rows($result) > 0){ echo("{$produto['sobre']}"); }?></textarea>
        </div>
        
        <div class="col-12">
            <button type="submit" class="btn btn-success"><i class="fas fa-save">  Salvar</i></button>
        </div>
    </form>
</div>