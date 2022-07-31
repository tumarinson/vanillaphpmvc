<?php

namespace app\Models;

use core\Models\Model;

class User extends Model
{
    public function getAll()
    {
        return $this->databaseConnection->query('SELECT * FROM users');
    }
}
