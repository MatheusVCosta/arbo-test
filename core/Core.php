<?php

class Core
{
    public function run($routes)
    {
        $url = '/';

        isset($_GET['url']) ? $url .= $_GET['url'] : '';

        ($url != '/') ? $url = rtrim($url, '/') : $url;

        $routerFound = false;

        foreach ($routes as $path => $controller) {

            $pattern = '#^' . preg_replace('/{id}/', '(\w+)', $path) . '$#';
            if (preg_match($pattern, $url, $matches)) {

                array_shift($matches);
                [$currentController, $action] = explode('@', $controller);

                $routerFound = true;

                require_once __DIR__ . "/../controllers/$currentController.php";

                //Ex: $newController = new "UserController()"
                $newController = new $currentController();
                $newController->$action($matches);
            }
        }

        if (!$routerFound) {
            require_once __DIR__ . "/../controllers/NotFoundController.php";
            $controller = new NotFoundController();
            $controller->index();
        }
    }
}
