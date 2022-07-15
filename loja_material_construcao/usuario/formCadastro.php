<div id="cadastro" class="row" style="margin-top: 5%;">
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-bsox" class="col-md-12">
                    <form id="login-form" class="form" action="?pg=usuario/usuarioController.php" method="post">
                        <h3 class="text-center text-info">Cadastro:</h3>

                        <div class="form-group">
                            <label for="email" class="text-info">Email:</label><br>
                            <input type="text" name="email" id="email" class="form-control" style="width: 99%;">
                        </div>

                        <div class="form-group">
                            <label for="password" class="text-info">Senha:</label><br>
                            <input type="password" name="senha" id="senha" class="form-control" style="width: 99%;">
                            <label for="password" class="text-info">Confirmar Senha:</label><br>
                            <input type="password" name="senha2" id="senha2" class="form-control" style="width: 99%;">
                            <label for="nomeL" class="text-info">Nome Completo:</label><br>
                            <input type="text" name="nome" id="nome" class="form-control" style="width: 99%;">
                            <label for="cpfL" class="text-info">CPF:</label><br>
                            <input type="text" name="cpf" id="cpf" class="form-control" style="width: 99%;">
                        </div>
                        
                        <div class="form-group" style="display: inline-block; width:100%">
                            <button type="submit" class="btn btn-success" style="margin-top: 2%; width:49%" onclick="return verifica()">Cadastrar</button>
                            <button type="reset" class="btn btn-primary" style="margin-top: 2%; width:49%">Limpar</button>

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
        var senha1 = document.getElementById('senha');
        var senha2 = document.getElementById('senha2');
        var email = document.getElementById("email");
        var nome = document.getElementById("nome");
        var cpf = document.getElementById("cpf");

        if (senha.value != senha2.value) {
            alert("senhas diferentes");
            return false;
        }
        if (senha1.value == "" || senha2.value == "" || email.value == "" || nome.value == "" || cpf.value == "") {
            alert("campos vazios");
            return false;
        }
    }
</script>