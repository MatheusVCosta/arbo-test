<?php

require_once __DIR__ . '/core/Core.php';
require_once __DIR__ . '/utils/helper.php';
require_once __DIR__ . '/router/router.php';

$load_template = "";

// ini_set('display_errors', 1);
// ini_set('display_startup_erros', 1);
// error_reporting(E_ALL);
define('SITE_ROOT', realpath(dirname(__FILE__)));


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
