<html>
<?php require_once("template/head.php") ?>

<body>
    <div id="app">
        <div class="container direction-collum">
            <h1 class="text-center color-orange">Minha Casa Nova</h1>
            <p class="text-center">Venha! Anuncie sua casa hoje e pegue a chave amanhã</p>
            <div class="row">
                <h2 class="color-orange">Cadastro</h2>
            </div>
            <div class="row flex-2 padding-1 border-1-orange radius-1 center">
                <form action="" class="flex-2">
                    <div class="row flex-2">
                        <div class="content flex-2">
                            <label class="text-size-1 mg-1">Nome Completo</label>
                            <input type="text" class="input-text mg-1">
                        </div>
                    </div>
                    <div class="row flex-2">
                        <div class="content flex-1">
                            <label class="text-size-1 mg-1">E-mail</label>
                            <input type="text" class="input-text mg-1">
                        </div>
                    </div>
                    <div class="row flex-2">
                        <div class="content flex-2">
                            <label class="text-size-1 mg-1">Senha</label>
                            <input type="text" class="input-text mg-1">
                        </div>
                    </div>
                    <span class="line mg-t-1"></span>
                    <div class="row mg-t-2 center">
                        <button class=" btn btn-send pointer">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<footer>
    <?php require_once("template/footer.php") ?>
</footer>

</html>