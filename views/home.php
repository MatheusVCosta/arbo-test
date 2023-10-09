<html>
<?php require_once("template/head.php"); ?>
<script>

</script>

<body>
    <?php require_once("template/header.php") ?>
    <div id="app">
        <div class="container mg-b-2 ">
            <div class="menu-left padding-1 max-width-card-sm">
                <form action="javascript:void(0)" id="formFilter">
                    <div class="row center">
                        <strong>
                            <p class="text-color text-size-2 text-center">Busca avançada</p>
                        </strong>
                    </div>
                    <div class="row">
                        <div class="content flex-2 min-width-card">
                            <label class="text-size-1 mg-1">Tipo de imóvel</label>
                            <select class="input-text" id="selectTypeHouse" style="background-color:#fff;">
                                <option disabled selected>Selecione</option>
                                <option value="casa">Casa</option>
                                <option value="Apartamento">Apartamento</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="content flex-2">
                            <label class="text-size-1 mg-1">Estado</label>
                            <input type="text" class="input-text mg-1" id="txtState">
                        </div>
                    </div>
                    <div class="row">
                        <div class="content flex-2">
                            <label class="text-size-1 mg-1">Cidade</label>
                            <input type="text" class="input-text mg-1" id="txtCity">
                        </div>
                    </div>
                    <div class="row">
                        <div class="content mg-1 flex-1">
                            <label for="txtQtdRooms" class="form-label">Quarto</label>
                            <select class="input-text" id="txtQtdRooms" style="background-color:#fff;">
                                <?php for ($i = 1; $i <= 4; $i++) { ?>
                                    <option value="<?= $i ?>">
                                        <?php echo $i ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="content mg-1 flex-1">
                            <label for="txtQtdBaths" class="form-label">Banheiro</label>
                            <select class="input-text" id="txtQtdBaths" style="background-color:#fff;">
                                <?php for ($i = 1; $i <= 4; $i++) { ?>
                                    <option value="<?= $i ?>">
                                        <?php echo $i ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="content mg-1 flex-1">
                            <label for="txtQtdVacancy" class="form-label">Garagem</label>
                            <select class="input-text" id="txtQtdVacancy" style="background-color:#fff;">
                                <?php for ($i = 1; $i <= 4; $i++) { ?>
                                    <option value="<?= $i ?>">
                                        <?php echo $i ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mg-1">
                        <button class="btn btn-orange mg-1 pointer flex-2" onclick="applyFilter()">Buscar</button>
                    </div>
                </form>
            </div>
            <div id="renderizeContent">

                <body>
                    <div class="results">
                        <p><?php echo isset($houses) ? count($houses) : 0 ?> imóvel encontrados</p>
                    </div>
                    <div class="content flex-2 max-width-card-md box" style="margin-top:1rem; margin-bottom:7rem">
                        <?php if (!$houses) { ?>
                            <div class="empty">
                                <img src="public/images/home-icon-silhouette.png">
                                <p>Sem nada aqui ainda!</p>

                            </div>
                        <?php } ?>

                        <?php foreach ($houses as $house) { ?>
                            <div class="card pointer padding-1 mg-1">
                                <div class="box-img flex-1">
                                    <img src="<?= $house['path'] ?>" alt="">
                                </div>
                                <div class="informations flex-2">
                                    <div class="row mg-1 center">
                                        <strong>
                                            <p class="title-1 text-center"><?= $house['street'] . ", " . $house['city'] ?></p>
                                        </strong>
                                    </div>
                                    <span class="line-2" style="align-self:flex-start"></span>
                                    <div class="row mg-1 ">
                                        <p class="title-2"><?= $house['district'] . ", " . $house['state'] ?></p>
                                    </div>

                                    <div class="row mg-1">
                                        <p class="card-text ">
                                            <?= $house['description'] ?>
                                        </p>
                                    </div>
                                    <div class="row mg-1">
                                        <p class="text-size-1">R$<?= $house['price'] ?></p>
                                    </div>
                                    <div class="rooms-row flex-2">
                                        <span class='rooms flex-1'><?= $house['house_type'] ?></span>
                                        <span class='rooms flex-1'><?= $house['contract_type'] ?></span>
                                    </div>
                                    <div class="rooms-row ">
                                        <span class='rooms'><?= $house['amout_room'] ?> Quato </span>
                                        <span class='rooms'><?= $house['amount_baths'] ?> Banheiro </span>
                                        <span class='rooms'><?= $house['amount_vacancy'] ?> Garagem</span>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </body>
            </div>
        </div>
    </div>
</body>
<footer>
    <?php require_once("template/footer.php") ?>
</footer>
<script src="views/assets/javascript/request.js"></script>


</html>