<html>

<?php require_once("template/head.php") ?>

<body>
    <?php require_once("template/header.php") ?>
    <div id="app">
        <div class="container direction-collum w-sm max-w-sm">
            <h1 class="text-center color-orange">Minha Casa Nova</h1>
            <p class="text-center"></p>
            <div class="row">
                <h2 class="color-orange">Login</h2>
            </div>
            <div class="row flex-2 padding-1 border-1-orange radius-1 center">
                <div class="content flex-2">
                    <form id="" class="flex-2" method="POST">
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
                        <div class="row mg-t-2 center flex-2">
                            <button class="btn btn-send pointer flex-2" id="btnLogin">Entrar</button>
                        </div>
                        <div class="row mg-t-2 center flex-2">
                            <span class="mg-r-1"> Ainda não tem conta? </span><a class="color-orange" href="/test-arbo/arbo-test/user_register">Clique aqui</a>
                        </div>
                    </form>
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