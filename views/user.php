<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $config->PROJECT_NAME; ?></title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public/style.css">
    <link rel="stylesheet" href="public/checkbox.css">
    <link rel="stylesheet" href="views/assets/css/style.css">
</head>

<body>
    <div id="app">
        <div class="container direction-collum">
            <h1 class="text-center color-orange">Minha Casa Nova</h1>
            <p class="text-center">Venha! Anuncie sua casa hoje e pegue a chave amanhã</p>
            <div class="row">
                <h2 class="color-orange">Cadastro</h2>
            </div>
            <div class="row flex-2 padding-1 border-1-orange radius-1 center">
                <div class="content">
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
                                <input type="text" class="input-text mg-1" name="txtEmail" id="txtEmail" required>
                            </div>
                        </div>
                        <div class="row flex-2">
                            <div class="content flex-2">
                                <label for="txtPassword" class="text-size-1 mg-1">Senha</label>
                                <input type="text" class="input-text mg-1" name="txtPassword" id="txtPassword" required>
                            </div>
                        </div>
                        <span class="line mg-t-1"></span>
                        <div class="row mg-t-2 center">
                            <button class="btn btn-send pointer" id="btnSend">Enviar</button>
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