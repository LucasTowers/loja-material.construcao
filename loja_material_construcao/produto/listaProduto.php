<?php

include "../conexao.php";

$sql = "select id,descricao,val_unitario as preco from produto";

$result = mysqli_query($_conn, $sql);

?>
<div class="container">


    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">nome</th>
                <th scope="col">preco</th>
                <th soope="col"></th>
            </tr>
        </thead>

        <?php
        while ($produto = mysqli_fetch_array($result)) :


        ?>

            <tr>
                <td><?= $produto['id'] ?></td>
                <td><?= $produto['descricao'] ?></td>
                <td><?= round($produto['preco'], 2) ?></td>
                <td>
                    <form action="?pg=produto/formProduto.php" method="POST">
                        <input type="hidden" name="operacao" value="alterar">
                        <input type="hidden" name="item" value="<?= "{$produto['id']}" ?>">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                    </form>
                    
                    <form action="?pg=produto/produtoController.php" method="POST">
                        <input type="hidden" name="operacao" value="excluir">
                        <input type="hidden" name="id" value="<?= "{$produto['id']}" ?>">
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>


                </td>
            </tr>



        <?php
        endwhile;
        ?>
    </table>

    <form action="?pg=produto/formProduto.php" method="POST">
    <input type="hidden" name="operacao" value="cadastrar">
    <input type="hidden" name="item" value="0">
        <button type="submit" class="btn btn-success"><i class="far fa-plus-square"> cadastrar</i></button>
    </form>
</div>