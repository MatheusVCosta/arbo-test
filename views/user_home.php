<?php
session_start();
if (!$_SESSION['user_authenticated']) {
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
            <?php for ($i = 1; $i <= 7; $i++) { ?>
                <div class="card pointer">
                    <img src="public/images/casa1.jpg" alt="">
                    <div class="informations">
                        <div class="row mg-1 line">
                            <h3 class="titulo-3">Chácara Santo Antônio (Zona Leste), São Paulo</h3>
                        </div>
                        <div class="row mg-1">
                            <span class="street-text">Rua xablau</span>
                        </div>
                        <div class="row mg-1">
                            <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas error labore earum. Consequatur reprehenderit possimus necessitatibus perferendis et! Excepturi repudiandae doloribus maiores id facilis, ad quo error asperiores minus temporibus?</p>
                        </div>
                        <div class="row mg-1">
                            <p>R$495.000</p>
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
    <footer>
        <?php require_once("template/footer.php") ?>
    </footer>
</body>

<script src="views/assets/javascript/request.js"></script>

</html>