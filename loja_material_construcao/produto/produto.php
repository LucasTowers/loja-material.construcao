<?php



$id = $_POST['id'];

$sql = "SELECT
produto.id,
produto.especificacoes as especificacoes,
produto.descricao as nome, 
tipo.descricao as tipo,
marca.descricao AS marca, 
produto.val_unitario as preco,
imagemProduto as prod_imagem
FROM produto
INNER JOIN marca ON produto.marca = marca.id
INNER JOIN tipo ON produto.tipo = tipo.id
WHERE produto.id = $id";



$result = mysqli_query($_conn, $sql);

$produto = mysqli_fetch_array($result);
?>


<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 medias-container">
        <img src="<?= $produto['prod_imagem'] ?>" alt="" class="img-fluid">
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
        <div class="row">
            <h2><?= $produto['nome']?></h2>
            <p>Estoque: disponivel</p>
        </div>
        <hr>
        <div class="row">
        <h3>Por apenas R$<?=$produto['preco']?> a vista, ou 12x de R$<?=round($produto['preco']/12,2)?> sem juros.</h3>  
        </div>
        <hr>
        <div class="row">
            <form action="?pg=carrinho/carrinhoController.php" method="POST">
                <input type="hidden" name="produto_id" value="<?= $produto['id'] ?>">
                <input type="hidden" name="operacao" value="adiciona">
                <label for="">Quantidade requisitada:</label>
                <input type="number" name="quantidade" min="1" value="1" style="text-align: center;">
                <div class="row">
                <button type="submit" class="btn btn-success" style="margin-top: 5%; width:95%"><i class="fas fa-shopping-cart"></i></button>
                </div>
                
            </form>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <h4>Descricao do produto:</h4>
    <p><?= $produto['especificacoes'] ?></p>
</div>