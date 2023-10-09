<?php
if (!isset($_SESSION['user_authenticated'])) {
    header('Location: /test-arbo/arbo-test');
}
?>
<html>
<?php require_once("template/head.php") ?>

<body>
    <?php require_once("template/header.php") ?>

    <div id="app">
        <h1>Meus imóveis</h1>
        <div class="container container-wrap">
            <?php foreach ($houses_user as $house) { ?>
                <div class="card pointer flex-1 mg-2 max-width-card padding-1 " id="<?= $house['house_id'] ?>" onclick="openEditHOuse(<?= $house['house_id'] ?>)">
                    <div class="box-img flex-1">
                        <img src="<?= $house['path'] ?>" alt="">
                    </div>
                    <div class="informations flex-1 mg-1">
                        <div class="row mg-1 line">
                            <h3 class="titulo-1"><?= $house['district'] . ", " . $house['state'] ?></h3>
                        </div>
                        <div class="row mg-1">
                            <span class="title-1"><?= $house['street'] . ", " . $house['city'] ?></span>
                        </div>
                        <div class="row mg-1">
                            <p class="card-text">
                                <?= $house['description'] ?>
                            </p>
                        </div>
                        <div class="row mg-1">
                            <p>R$<?= $house['price'] ?></p>
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
    </div>
    <footer>
        <?php require_once("template/footer.php") ?>
    </footer>
</body>

<script src="views/assets/javascript/request.js"></script>
<script>
    let openEditHOuse = (house_id) => {
        window.location = `${url_base}/renderInsertHouse?house_id=${house_id}&page_mode=edit`
    }
</script>

</html>