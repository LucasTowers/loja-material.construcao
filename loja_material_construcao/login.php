<div id="login" class="row">
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form class="form" action="validaLogin.php" method="post">
                        <h3 class="text-center text-info">Login:</h3>

                        <div class="form-group">
                            <label for="email" class="text-info">E-mail:</label><br>
                            <input type="text" name="email" id="email" class="form-control" style="width: 99%;">
                        </div>

                        <div class="form-group">
                            <label for="password" class="text-info">Senha:</label><br>
                            <input type="password" name="senha" id="senha" class="form-control" style="width: 99%;">
                        </div>

                        <div class="form-group" style="display: inline-block; width:100%; margin-top:2%">
                            <button type="submit" class="btn btn-success" id="btn" style=" width:32%" onclick="return verifica()">Entrar</button>
                            <button type="reset" class="btn btn-primary" style=" width:32%">Limpar</button>
                            <a href="?pg=usuario/formCadastro.php" class="btn btn-info" style="width: 32%;">Cadastrar-se</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php
        if ($_GET['msg']) {
        ?>

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?= $_GET['msg'] ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        ?>
    </div>
</div>

<script lang="javascript">
    function verifica() {
        var email = document.getElementById('email');
        console.log(email.value);
        var senha = document.getElementById('senha');
        var btn = document.getElementById('btn');

        if (email.value == "" || senha.value == "") {
            alert("os campos devem ser preenchidos.");
            return false;
        }
    }
</script>