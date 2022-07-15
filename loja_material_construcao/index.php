<?php
error_reporting(E_ERROR | E_PARSE);
session_start();

(!isset($_SESSION['cart']))? $_SESSION['cart'] = array(): "";

include "conexao.php";

if(isset($_SESSION['loja_user_nome'])){
$sql = "select tipo from usuario where id = {$_SESSION['loja_user_id']}";

$resultado = mysqli_query($_conn, $sql);

$resultado2 = mysqli_fetch_assoc($resultado);
}

?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/deb35d673b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Torres Contrucao</title>


</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="bi bi-hammer"></i></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?pg">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="?pg=produto/produto_mostra.php&tipo=1">Ferramentas</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="?pg=produto/produto_mostra.php&tipo=2">Elétrica</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="?pg=produto/produto_mostra.php&tipo=3">Madeira</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="?pg=produto/produto_mostra.php&tipo=4">Ferragens</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="?pg=produto/produto_mostra.php&tipo=5">Hidraulicos</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Seguranca</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="?pg=produto/produto_mostra.php&tipo=6">Capacetes</a></li>
                            <li><a class="dropdown-item" href="?pg=produto/produto_mostra.php&tipo=7">Botas</a></li>
                            <li><a class="dropdown-item" href="?pg=produto/produto_mostra.php&tipo=8">Coletes</a></li>
                        </ul>
                    </li>

                </ul>
            </div>

            <div class="btn-group fixed-left">

                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="far fa-user"></i>
                </button>

                <ul class="dropdown-menu dropdown-menu-end" data-bs-toggle="expand">
                    <li style="text-align:center;"><?php 
                    if(isset($_SESSION['loja_user_nome'])):
                    echo ("{$_SESSION['loja_user_nome']}");
                    else:
                        echo("Usuario");
                    endif; 
                    
                    ?></li>

                        <hr class="dropdown-divider">

                    <?php

                    if (isset($_SESSION["loja_user_nome"]) and isset($_SESSION["loja_user_email"])) :
                    ?>
                        <li style="margin: 2%;"><a href="logout.php" class="btn btn-primary" alt="logout"><i class="fas fa-sign-out-alt"></i></i></a>
                            <label for="">Logout</label>
                        <li><a href="?pg=carrinho/carrinho.php" style="margin: 2%;" class="btn btn-primary"><i class="fas fa-shopping-cart"></i></a>
                            <label for="">Seu Carrinho</label>
                        </li>
                    <?php

                    else :
                    ?>
                        <li><a href="?pg=login.php" style="margin: 2%;" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i></a>
                            <label for="">Login</label>
                        </li>

                        <li><a href="?pg=carrinho/carrinho.php" style="margin: 2%;" class="btn btn-primary"><i class="fas fa-shopping-cart"></i></a>
                            <label for="">Seu Carrinho</label>
                        </li>
                    <?php

                    endif;

                    ?>

                    <?php

                    if ($resultado2['tipo'] == 1) :
                    ?>
                        <li><a href="?pg=produto/listaProduto.php" style="margin: 2%;" class="btn btn-primary"><i class="fas fa-archive"></i></a> <label for="">Produto</label></li>
                    <?php

                    endif
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <main style="margin-top:2%;" class="container">

        <?php if ($_REQUEST["pg"])
            include $_REQUEST["pg"];
        else
            include 'home.php';

        ?>

    </main>
    <footer>
        <h4>Nossa Historia:</h4>
        <p>Fundada em 1998 por Luis Antonio Torres e sua esposa Ana Maria Torres, a rede Torres Construcão vem dia a após dia colaborando cada vez mais com o a area da construcao civil no cenário brasileiro fornecendo os produtos de mais alta qualidade oferecidos no mercado.</p>
        <p>

        </p>
    </footer>
</body>

</html>