<?php
session_start();


if (count($_SESSION['cart']) > 0) {
?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Preco</th>
                <th soope="col"></th>
            </tr>
        </thead>
        <tbody>


            <?php



            ?>
            <?php
            foreach($_SESSION["cart"] as $id => $quantidade) :
                $temp = (int)$id;
                $sql = "SELECT descricao as nome, val_unitario as preco from produto where id = $temp";

                $result = mysqli_query($_conn,$sql);

                $linha = mysqli_fetch_assoc($result);
             
            ?>

                <tr>
                    <td><?= $linha['nome'] ?></td>
                    <td><?= $quantidade ?></td>
                    <td><?= round($linha['preco']*$quantidade,2)   ?></td>
                    
                    <td>
                        <form action="?pg=carrinho/carrinhoController.php" method="POST">
                            <input type="hidden" name="operacao" value="excluir">
                            <input type="hidden" name="produto_id" value="<?= $temp ?>">
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>


                
            <?php
            endforeach;
            $_SESSION['loja_user_compra'] = 0;
            ?>
    </table>
    </tbody>
    <form action="?pg=carrinho/carrinhoController.php" method="POST">
        <input type="hidden" name="operacao" value="fechar">
        <button type="submit" class="btn btn-success">Fechar Compra</button>
    </form>
<?php } else {
    
?>
        
    <div class="alert alert-dark" role="alert" style="margin-top: 3%; margin-right:2%">
        Carrinho Vazio
    </div>

<?php
} ?>