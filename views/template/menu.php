<?php
session_start()
?>
<div class="nav">
    <a target="_blank" class="brand" href="">Minha Casa Nova</a>
    <?php if (!$_SESSION['user_authenticated']) { ?>
        <ul>
            <li class="nav-item item"><a href="/test-arbo/arbo-test/">Inicio</a></li>
            <li class="nav-item"><a href="/test-arbo/arbo-test/user_register"><button id="btnRegister" class="btn register">Registrar</button></a></li>
            <li class="nav-item"><a href="/test-arbo/arbo-test/user_login"><button class="btn login">Login</button></a></li>
        </ul>
    <?php } else { ?>
        <ul>
            <li class="nav-item item"><a href="/test-arbo/arbo-test/">Inicio</a></li>
            <li class="nav-item"><a href="/test-arbo/arbo-test/user_index"><button class="btn login">Área do usuário</button></a></li>
            <li class="nav-item"><a href="/test-arbo/arbo-test/renderInsertHouse"><button class="btn btn-search mg-1 pointer">Anunciar</button></a></li>
            <li class="nav-item"><a href="/test-arbo/arbo-test/user_logout"><button class="btn btn-search mg-1 pointer">Sair</button></a></li>
            <li class="border-1-orange" style="width:45px;height:45px;border-radius:25px;"></li>

        </ul>
    <?php } ?>
</div>