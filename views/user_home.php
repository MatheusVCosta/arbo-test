<?php
if (!isset($_SESSION['user_authenticated'])) {
    header('Location: /test-arbo/arbo-test');
}
?>
<html>
<?php require_once("template/head.php") ?>

<body>
    <?php require_once("template/header.php") ?>

    <div id="app" class="center">
        <h1>Meus imóveis</h1>
        <span class="line"></span>
        <div class="container ">
            <?php foreach ($houses_user as $house) { ?>
                <div class="card pointer" id="<?= $house['house_id'] ?>" onclick="editHouse(<?= $house['house_id'] ?>)">
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
                        <?php if (false) { ?>
                            <div class="rooms-row ">
                                <span class='rooms'>2 quartos</span>
                                <span class='rooms'>2 quartos</span>
                                <span class='rooms'>2 quartos</span>
                                <span class='rooms'>2 quartos</span>
                                <span class='rooms'>2 quartos</span>
                                <span class='rooms'>2 quartos</span>
                            </div>
                        <?php } ?>
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
    let editHouse = (id_house) => {
        alert(id_house)
    }
</script>

</html>