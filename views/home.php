<html>
<?php require_once("template/head.php"); ?>

<body>
    <?php require_once("template/header.php") ?>
    <div id="app">
        <div class="container">
            <div class="menu-left padding-1 flex-1">
                <div class="row">
                    <strong>
                        <p class="text-color flex-1 text-size-2 text-center">Busca avançada</p>
                    </strong>
                </div>
                <div class="row">
                    <div class="content flex-2">
                        <label class="text-size-1 mg-1">Tipo de imóvel</label>
                        <input type="text" class="input-text mg-1">
                    </div>
                    <div class="content flex-2">
                        <label class="text-size-1 mg-1">Estado</label>
                        <input type="text" class="input-text mg-1">
                    </div>
                    <div class="content flex-2">
                        <label class="text-size-1 mg-1">Cidade</label>
                        <input type="text" class="input-text mg-1">
                    </div>
                    <div class="content flex-1" style="max-width:160px">
                        <label class="text-size-1 mg-1">Valor minimo</label>
                        <input type="text" class="input-text mg-1">
                    </div>
                    <div class="content flex-1" style="max-width:160px">
                        <label class="text-size-1 mg-1">Valor maximo</label>
                        <input type="text" class="input-text mg-1">
                    </div>
                </div>
                <div class="row mg-1">
                    <div class="content padding-1">
                        <label>Banheiros</label>
                        <div class="content">
                            <div class="row mg-1">
                                <?php for ($i = 1; $i <= 4; $i++) { ?>
                                    <div class="checkbox-wrapper-33">
                                        <label class="checkbox">
                                            <input class="checkbox__trigger visuallyhidden" type="checkbox" />
                                            <span class="checkbox__symbol">
                                                <?= $i ?>
                                            </span>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="content padding-1">
                        <label>Quartos</label>
                        <div class="content">
                            <div class="row mg-1">
                                <?php for ($i = 1; $i <= 4; $i++) { ?>
                                    <div class="checkbox-wrapper-33">
                                        <label class="checkbox">
                                            <input class="checkbox__trigger visuallyhidden" type="checkbox" />
                                            <span class="checkbox__symbol">
                                                <?= $i ?>
                                            </span>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mg-1">
                    <button class="btn btn-search mg-1 pointer flex-2">Buscar</button>
                </div>
            </div>
            <div class="content flex-2">
                <div class="container ">
                    <?php foreach ($housers as $house) { ?>
                        <div class="card pointer">
                            <img src="public/images/casa1.jpg" alt="">
                            <div class="informations">
                                <div class="row mg-1 line">
                                    <h3 class="titulo-3"><?= $house['district'] . ", " . $house['state'] ?></h3>
                                </div>
                                <div class="row mg-1">
                                    <span class="street-text"><?= $house['street'] . ", " . $house['city'] ?></span>
                                </div>
                                <div class="row mg-1">
                                    <p class="card-text">
                                        <?= $house['description'] ?>
                                    </p>
                                </div>
                                <div class="row mg-1">
                                    <p>R$<?= $house['price'] ?></p>
                                </div>
                                <div class="rooms-row ">
                                    <span class='rooms'>2 quartos</span>
                                    <span class='rooms'>2 quartos</span>
                                    <span class='rooms'>2 quartos</span>
                                    <span class='rooms'>2 quartos</span>
                                    <span class='rooms'>2 quartos</span>
                                    <span class='rooms'>2 quartos</span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>
<footer>
    <?php require_once("template/footer.php") ?>
</footer>
<script src="views/assets/javascript/request.js"></script>

</html>