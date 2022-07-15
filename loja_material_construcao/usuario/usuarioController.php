<?php

include "../conexao.php";
echo("entrou");


$email = $_POST['email'];
$senha = $_POST['senha'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];

$sql = "select * from usuario where email = '{$email}'";

$result = mysqli_query($_conn,$sql);

if(mysqli_num_rows($result) == 0){


$sql = "insert into usuario
(nome,email,senha,cpf) values
('{$nome}','{$email}','{$senha}','{$cpf}')";

 $result = mysqli_query($_conn,$sql);

 if($result){
    echo "Foi";
 }else{
     echo "Nao foi"; 
 }

?>

<script>
    window.location.replace("?pg=login.php");
</script>

<?php
}else{
    ?>
<script>
    window.location.replace("?pg=usuario/formCadastro.php&msg=usuario existente");
</script>
    <?php
}
?>