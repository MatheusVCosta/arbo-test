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