<?php

namespace app\Controller;

use app\Models\User;

class UsersController
{
    public function index()
    {
        $user = new User();
        $users = $user->getAll();
        require APP_ROOT_DIRECTORY . "app/views/users.list.php";
    }

    public function view(array $params)
    {
        $userId = array_shift($params);
        require APP_ROOT_DIRECTORY . "app/views/users.view.php";
    }
}
