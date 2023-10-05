<html>
<?php require_once("template/head.php") ?>

<body>
    <?php require_once("template/header.php") ?>
    <div id="app">
        <div class="container">
            <div class="menu-left flex-1">
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
                </div>
                <div class="line"></div>
                <div class="row">
                    <div class="content flex-1" style="max-width:160px">
                        <label class="text-size-1 mg-1">Valor minimo</label>
                        <input type="text" class="input-text mg-1">
                    </div>
                    <div class="content flex-1" style="max-width:160px">
                        <label class="text-size-1 mg-1">Valor maximo</label>
                        <input type="text" class="input-text mg-1">
                    </div>
                </div>
                <div class="line"></div>
                <div class="row mg-1">
                    <div class="content padding-1">
                        <label>Banheiros</label>
                        <div class="content">
                            <div class="row mg-1">
                                <div class="checkbox-wrapper-33">
                                    <label class="checkbox">
                                        <input class="checkbox__trigger visuallyhidden" type="checkbox" />
                                        <span class="checkbox__symbol">
                                            1
                                        </span>
                                    </label>
                                </div>
                                <div class="checkbox-wrapper-33">
                                    <label class="checkbox">
                                        <input class="checkbox__trigger visuallyhidden" type="checkbox" />
                                        <span class="checkbox__symbol">
                                            2
                                        </span>
                                    </label>
                                </div>
                                <div class="checkbox-wrapper-33">
                                    <label class="checkbox">
                                        <input class="checkbox__trigger visuallyhidden" type="checkbox" />
                                        <span class="checkbox__symbol">
                                            3
                                        </span>
                                    </label>
                                </div>
                                <div class="checkbox-wrapper-33">
                                    <label class="checkbox">
                                        <input class="checkbox__trigger visuallyhidden" type="checkbox" />
                                        <span class="checkbox__symbol">
                                            4+
                                        </span>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row mg-1">
                    <div class="content padding-1">
                        <label>Quartos</label>
                        <div class="content">
                            <div class="row mg-1">
                                <div class="checkbox-wrapper-33">
                                    <label class="checkbox">
                                        <input class="checkbox__trigger visuallyhidden" type="checkbox" />
                                        <span class="checkbox__symbol">
                                            1
                                        </span>
                                    </label>
                                </div>
                                <div class="checkbox-wrapper-33">
                                    <label class="checkbox">
                                        <input class="checkbox__trigger visuallyhidden" type="checkbox" />
                                        <span class="checkbox__symbol">
                                            2
                                        </span>
                                    </label>
                                </div>
                                <div class="checkbox-wrapper-33">
                                    <label class="checkbox">
                                        <input class="checkbox__trigger visuallyhidden" type="checkbox" />
                                        <span class="checkbox__symbol">
                                            3
                                        </span>
                                    </label>
                                </div>
                                <div class="checkbox-wrapper-33">
                                    <label class="checkbox">
                                        <input class="checkbox__trigger visuallyhidden" type="checkbox" />
                                        <span class="checkbox__symbol">
                                            4+
                                        </span>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="line"></div>
                <div class="row mg-1">
                    <button class="btn btn-search mg-1 pointer flex-2">Buscar</button>
                </div>
            </div>
            <div class="content border-left-blue border-bottom-blue flex-2">
                <div class="row mg-1">
                    <input class="input-text mg-1 flex-2" type="text" placeholder="Buscar">
                    <button class="btn btn-search mg-1 pointer">Buscar</button>
                </div>
                <?php for ($i = 1; $i <= 10; $i++) { ?>
                    <div class="row mg-2">
                        <div class="card pointer">
                            <img src="public/images/casa1.jpg" alt="">
                            <div class="informations">
                                <div class="row mg-1">
                                    <p>Chácara Santo Antônio (Zona Leste), São Paulo</p>
                                </div>
                                <div class="row mg-1">
                                    <span>Rua xablau</span>
                                </div>
                                <div class="row mg-1">
                                    <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas error labore earum. Consequatur reprehenderit possimus necessitatibus perferendis et! Excepturi repudiandae doloribus maiores id facilis, ad quo error asperiores minus temporibus?</p>
                                </div>
                                <div class="row mg-1">
                                    <p>R$495.000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if ($i < 10) { ?>
                        <span class="line blue"></span>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
<footer>
    <?php require_once("template/footer.php") ?>
</footer>

</html>