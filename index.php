<?php

require_once __DIR__ . '/core/Core.php';

require_once __DIR__ . '/router/router.php';

$load_template = "";

spl_autoload_register(function ($file) {
    require_once __DIR__ . '/core/Config.php';
    if (file_exists(__DIR__ . "/utils/$file.php")) {
        require_once __DIR__ . "/utils/$file.php";
    } else if (file_exists(__DIR__ . "/models/$file.php")) {
        require_once __DIR__ . "/models/$file.php";
    }
});

$core = new Core();
$core->run($routes);
