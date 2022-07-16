<?php

namespace app\Controller;

class UsersController
{
    public function index()
    {
        require APP_ROOT_DIRECTORY . "app/views/users.list.php";
    }

    public function view(array $params)
    {
        $userId = array_shift($params);
        require APP_ROOT_DIRECTORY . "app/views/users.view.php";
    }
}
