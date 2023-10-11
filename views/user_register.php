<html>
<?php require_once("template/head.php") ?>

<body>
    <?php require_once("template/header.php") ?>
    <div id="app">
        <div class="container direction-collum w-sm max-w-sm">
            <h1 class="text-center color-orange">Minha Casa Nova</h1>
            <p class="text-center">Venha! Anuncie sua casa hoje e entregue a chave amanhã</p>
            <div class="row">
                <h2 class="color-orange">Cadastro</h2>
            </div>
            <div class="row flex-2 padding-1 border-1-orange radius-1 center">
                <div class="content flex-2 " style="width:370px; padding:20px">
                    <form id="" class="flex-2">
                        <div class="row flex-2">
                            <div class="content flex-2">
                                <label for="txtName" class="text-size-1 mg-1">Nome Completo</label>
                                <input type="text" class="input-text mg-1" name="txtName" id="txtName" required>
                            </div>
                        </div>
                        <div class="row flex-2">
                            <div class="content flex-1">
                                <label for="txtEmail" class="text-size-1 mg-1">E-mail</label>
                                <input type="email" class="input-text mg-1" name="txtEmail" id="txtEmail" required>
                            </div>
                        </div>
                        <div class="row flex-2">
                            <div class="content flex-2">
                                <label for="txtPassword" class="text-size-1 mg-1">Senha</label>
                                <input type="password" class="input-text mg-1" name="txtPassword" id="txtPassword" required>
                            </div>
                        </div>
                        <span class="line mg-t-1"></span>
                        <div class="row mg-t-2 flex-2">
                            <button class="btn btn-orange pointer flex-2" id="btnSend">Enviar</button>
                        </div>
                        <div class="row mg-t-2 center flex-2">
                            <span class="mg-r-1"> Já possui uma conta? </span><a class="color-orange" href="/user_login">Clique aqui</a>
                        </div>
                    </form>
                    <div class="row center mg-t-1">
                        <p id="info" class="info"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <?php require_once("template/footer.php") ?>
    </footer>
</body>

<script src="views/assets/javascript/request.js"></script>

</html>