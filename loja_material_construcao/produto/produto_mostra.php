<?php


$tipo = $_GET['tipo'];


$sql = "select descricao from tipo where id = $tipo";

$result = mysqli_query($_conn,$sql);

$temp = mysqli_fetch_array($result);

$temp = $temp['descricao'];

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
WHERE produto.tipo = $tipo";

//if ($_GET["categoria"]) {
//	$sql .= " WHERE id = " . $_GET["categoria"];
//}

$result = mysqli_query($_conn, $sql);


?>
<h2 style="text-align: center;"><?php echo("$temp"); ?></h2>

<?php
if(mysqli_num_rows($result) > 0){
while ($produto = mysqli_fetch_array($result)) :
?>



<div class="card" style="width: 18rem; display:inline-block">
  <img src="<?= $produto['prod_imagem']?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= $produto['nome']?></h5>
    <p class="card-text">R$<?= $produto['preco']?> a vista, ou em 12x de R$<?=round($produto['preco']/12,2) ?> sem juros</p>
	  <form action="?pg=produto/produto.php" method="POST" style="width: 100%;">
		  <input type="hidden" name="id" value="<?=$produto['id']?>">
		  <button type="submit" class="btn btn-success" style="width: 100%; display:inline-block">Página do Produto</button>
	  </form>
	
	

  </div>
</div>

<?php
endwhile;
}else{
  ?>
  <div class="alert alert-primary" role="alert">
   Produto sem estoque no momento
  </div>
  
  <?php
}
?>