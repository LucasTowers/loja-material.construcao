<?php

include "../conexao.php";

$id =               $_POST['id'];
$operacao =         $_POST['operacao'];
$descricao =        $_POST['descricao'];
$marca =            $_POST['marca'];
$tipo =             $_POST['tipo'];
$preco =            $_POST['preco'];
$especificacao =    $_POST['especificacao'];


if($operacao == "alterar"){
$sql = "update produto
set descricao = '{$descricao}',
marca = '{$marca}',
tipo = '{$tipo}',
val_unitario = '{$preco}',
especificacoes = '{$especificacao}'
where id = '{$id}'";

$result = mysqli_query($_conn,$sql);

}elseif($operacao == "excluir"){
    $sql = "DELETE FROM `produto` WHERE id = '{$id}'; ";

   mysqli_query($_conn,$sql);

}elseif($operacao == "cadastrar"){
    $sql = "INSERT INTO produto
    ( descricao, tipo, val_unitario, marca, especificacoes)
    VALUES ('{$descricao}',{$tipo},{$preco},{$marca},'{$especificacao}')";

    $result = mysqli_query($_conn,$sql);

}

?>

<script>
    window.location.replace("?pg=produto/listaProduto.php");
</script>

