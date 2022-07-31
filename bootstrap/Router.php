<?php

namespace bootstrap;

final class Router
{
    private array $routes = [];

    public function __construct()
    {
        $this->initRoutes();
    }

    public function initRoutes(): void
    {
        include "../app/routes/web.php";
        $this->routes = $webRoutes;
    }

    public function route(string $requestUri)
    {
        return $this->doAction($requestUri);
    }

    private function doAction(string $url)
    {
        [$action, $params] = $this->findRoute($url);
        [$controller, $actionName] = $this->parseActionForUrl($action);

        return $this->exec($controller, $actionName, $params);
    }

    private function findRoute(string $requestUri): array
    {
        $requestUri = ltrim($requestUri, '/');

        foreach ($this->routes as $routePath => $action) {
            $pattern = '/^' . str_replace('/', '\/', $routePath) . '$/';
            if (preg_match($pattern, $requestUri, $params)) {
                array_shift($params);
                return [$action, $params];
            }
        }

        throw new \Exception('Path not found');
    }

    private function parseActionForUrl(string $action): array
    {
        $explodeAction = explode('@', $action);
        $controllerName = $explodeAction[0];
        $actionName = $explodeAction[1];
        include APP_ROOT_DIRECTORY . $controllerName . '.php';
        $controller = str_replace('/', '\\', $controllerName);

        return [$controller, $actionName];
    }

    private function exec(mixed $controller, mixed $actionName, ?array $params)
    {
        $controllerObject = new $controller();
        return is_array($params)
            ? $controllerObject->$actionName($params)
            : $controllerObject->$actionName();
    }
}
