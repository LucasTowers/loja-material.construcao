<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
	<div class="carousel-indicators">
		<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
		<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
		<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
	</div>

	<div class="carousel-inner" >
		<div class="carousel-item active">
			<img src="imagem/carrossel1.jpg" class="img_carousel" alt="..." style="width: 100%;
    height: 600px;">
		</div>

		<div class="carousel-item">
			<img src="imagem/carrossel2.jpg" class="img_carousel" alt="..." style="width: 100%;
    height: 600px;">
		</div>

		<div class="carousel-item">
			<img src="imagem/carrossel3.jpg" class="img_carousel" alt="..." style="width: 100%;
    height: 600px;">
		</div>	
	</div>

	<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Previous</span>
	</button>

	<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Next</span>
	</button>
</div>


<h3>Produtos Populares</h3>

<?php
include "conexao.php";

$sql = "SELECT
produto.id,
produto.descricao as nome, 
tipo.descricao as tipo,
marca.descricao AS marca, 
produto.val_unitario as preco,
imagemProduto as prod_imagem
FROM produto
INNER JOIN marca ON produto.marca = marca.id
INNER JOIN tipo ON produto.tipo = tipo.id
WHERE produto.classificacao = 1";

//if ($_GET["categoria"]) {
//	$sql .= " WHERE id = " . $_GET["categoria"];
//}

$result = mysqli_query($_conn, $sql);
?>
<?php
while ($produto = mysqli_fetch_array($result)) :
?>



<div class="card" style="width: 18rem; display:inline-block">
  <img src="<?= $produto['prod_imagem']?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= $produto['nome']?></h5>
    <p class="card-text">Por apenas R$<?= $produto['preco']?> a vista, ou em 12x de R$<?=round($produto['preco']/12,2) ?> sem juros</p>
	<form action="?pg=produto/produto.php" method="POST" style="width: 100%;">
		<input type="hidden" name="id" value="<?=$produto['id']?>">
		<button type="submit" class="btn btn-success" style="width: 100%; display:inline-block">Página do Produto</button>
	</form>
	
	

  </div>
</div>

<?php
endwhile;
?>


<h3>Produtos recém lancados</h3>

<?php


$sql = "SELECT
produto.id,
produto.descricao as nome, 
tipo.descricao as tipo,
marca.descricao AS marca, 
produto.val_unitario as preco,
imagemProduto as prod_imagem
FROM produto
INNER JOIN marca ON produto.marca = marca.id
INNER JOIN tipo ON produto.tipo = tipo.id
WHERE produto.classificacao = 2";

//if ($_GET["categoria"]) {
//	$sql .= " WHERE id = " . $_GET["categoria"];
//}

$result = mysqli_query($_conn, $sql);
?>
<?php
while ($produto = mysqli_fetch_array($result)) :
?>



<div class="card" style="width: 18rem; display:inline-block;">
  <img src="<?= $produto['prod_imagem']?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= $produto['nome']?></h5>
    <p class="card-text">Por apenas R$<?= $produto['preco']?> a vista, ou em 12x de R$<?=round($produto['preco']/12,2) ?> sem juros</p>
	<form action="?pg=produto/produto.php" method="POST" style="width: 100%;">
		<input type="hidden" name="id" value="<?=$produto['id']?>">
		<button type="submit" class="btn btn-success" style="width: 100%; display:inline-block">Página do Produto</button>
	</form>
	
	

  </div>
</div>

<?php
endwhile;

$_SESSION['loja_user_compra'] = 0;
?>