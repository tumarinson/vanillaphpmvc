<?php

use bootstrap\Router;

define("APP_ROOT_DIRECTORY", initRootDirectory());

include "../bootstrap/Router.php";

bootApp();

function bootApp() {
    $requestUri = $_SERVER['REQUEST_URI'];
    $router = new Router();
    $router->route($requestUri);
}

function initRootDirectory() {
    return realpath($_SERVER['DOCUMENT_ROOT'] . '/../');
}
