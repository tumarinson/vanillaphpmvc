<?php

use bootstrap\Router;

ini_set('display_errors', 1);

define("APP_ROOT_DIRECTORY", initRootDirectory());

bootApp();

function bootApp() {
    initAutoloadingClasses();
    $requestUri = $_SERVER['REQUEST_URI'];
    $router = new Router();
    $router->route($requestUri);
}

function initRootDirectory() {
    return realpath($_SERVER['DOCUMENT_ROOT'] . '/../') . '/';
}

function initAutoloadingClasses() {
    spl_autoload_register(function ($className) {
        $className = str_replace('\\', '/', $className);
        include_once APP_ROOT_DIRECTORY . $className . '.php';
    });
}
