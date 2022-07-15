<?php

session_start();

include "../conexao.php";

$produtoID = $_POST['produto_id'];
$quantidade = $_POST['quantidade'];
$operacao = $_POST['operacao'];





if ($operacao == "adiciona") {

    $_SESSION['cart']["$produtoID"] = $quantidade;
    echo ("adiciona");
    print_r($_SESSION['cart']);
} elseif ($operacao == "excluir") {

    unset($_SESSION['cart']["$produtoID"]);
} elseif ($operacao == "fechar") {
    if ($_SESSION['loja_user_nome'] != "") {
        $sql = "SELECT MAX(id) as maxId from compra";

        $result = mysqli_query($_conn, $sql);

        $linha = mysqli_fetch_assoc($result);

        $temp = $linha['maxId'] + 1;

        $sql = "insert into compra (descricao,id_usuario) values('compra{$temp}',{$_SESSION['loja_user_id']})";

        mysqli_query($_conn, $sql);



        foreach ($_SESSION['cart'] as $id => $quantidade) {
            $temp2 = (int)$id;
            $sql = "insert into item_compra (id_compra,id_produto,quantidade) values($temp,{$temp2},$quantidade)";

            mysqli_query($_conn, $sql);

            unset($_SESSION['cart']["$id"]);
        }
?>

        <script>
            window.location.replace("?pg");
        </script>
    <?php

    } else {
    ?>
        <script>
            window.location.replace("?pg=login.php");
        </script>

<?php
    }
}




?>

<script>
    window.location.replace("?pg=carrinho/carrinho.php");
</script>