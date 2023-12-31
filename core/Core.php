<?php

class Core
{
    public function run($routes)
    {
        
        $url = '';
        $routerFound = false;
        if (isset($_SERVER['REQUEST_URI'])) {

            str_contains($_SERVER['REQUEST_URI'], "?") ? [$url, $args] =  explode("?", $_SERVER['REQUEST_URI']) : $url = $_SERVER['REQUEST_URI'];
        };

        $request_method = $_SERVER['REQUEST_METHOD'];
        ($url != '') ? $url = rtrim($url, '/') : $url;

        $url_bakup = "$url";
        if ($url == "") {
            $url_bakup = "/";
            $url = "home";
        }
        
        foreach ($routes as $k => $v) {
            $pattern = '#^' . preg_replace('/{id}/', '(\w+)', $url) . '$#';
            if (preg_match($pattern, $url, $matches)) {

                if ($v['url'] != $url_bakup) {
                    continue;
                }
                if ($v['method'] != $request_method) {
                    continue;
                }
                array_shift($matches);
                [$currentController, $action] = explode('@', $v['controller']);
                $routerFound = true;

                require_once __DIR__ . "/../controllers/$currentController.php";
                //Ex: $newController = new "UserController()"
                $newController = new $currentController();
                $newController->$action();
            }
        }

        if (!$routerFound) {
            require_once __DIR__ . "/../controllers/NotFoundController.php";
            $controller = new NotFoundController();
            $controller->index();
        }
    }
}
