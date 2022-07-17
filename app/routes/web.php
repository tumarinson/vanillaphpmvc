<?php

$webRoutes = [
    /** @see \app\Controller\UsersController::index() */
    '' => 'app/Controller/UsersController@index',
    'users' => 'app/Controller/UsersController@index',

    /** @see \app\Controller\UsersController::view() */
    'users/(\d+)/view' => 'app/Controller/UsersController@view',
];
