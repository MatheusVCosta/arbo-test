<?php
?>
<div class="nav">
    <img src="public/images/logo.png" alt="">
    <a target="_blank" class="brand" href="">Minha Casa Nova</a>

    <?php if (!isset($_SESSION['user_authenticated'])) { ?>
        <ul>
            <li class="nav-item item"><a href="/">Inicio</a></li>
            <li class="nav-item"><a href="/user_register"><button id="btnRegister" class="btn btn-orange">Registrar</button></a></li>
            <li class="nav-item"><a href="/user_login"><button class="btn btn-orange">Login</button></a></li>
        </ul>
    <?php } else { ?>
        <ul>
            <li class="nav-item item"><a href="/">Inicio</a></li>
            <li class="nav-item"><a href="/renderInsertHouse"><button class="btn  btn-orange hover mg-1 pointer">Anunciar</button></a></li>
            <li class="nav-item"><a href="/user_index"><button class="btn btn-orange hover">Área do usuário</button></a></li>
            <li class="nav-item"><a href="/user_logout"><button class="btn btn-orange mg-1 hover pointer">Sair</button></a></li>
        </ul>
    <?php } ?>
</div>