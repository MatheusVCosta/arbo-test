<?php

require_once __DIR__ . '/core/Core.php';
require_once __DIR__ . '/router/router.php';

$core = new Core();
$core->run($routes);
