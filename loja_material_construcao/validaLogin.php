<?php
$usuario = trim($_POST["email"]);
$senha = trim($_POST["senha"]);

include "conexao.php";

$sql = "SELECT distinct id, nome, email, senha FROM usuario
			WHERE email = '$usuario' AND senha = '$senha'";

$result = mysqli_query($_conn, $sql);


if ($usuario == "" || $senha == "") {
	header("location: ./?pg=login.php&msg=vazio");
	
} elseif (mysqli_num_rows($result) > 0) {
	$user = mysqli_fetch_array($result);
	session_start();
	$_SESSION["loja_user_id"]  =  $user["id"];
	$_SESSION["loja_user_nome"]  =  $user["nome"];
	$_SESSION["loja_user_email"]  =  $user["email"];
	$_SESSION["loja_user_compra"];
	header("location: ./?pg");


} else {
	header("location: ./?pg=login.php&msg=informacoes nao conferem");
}
