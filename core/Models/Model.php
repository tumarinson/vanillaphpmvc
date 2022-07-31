<?php

namespace core\Models;

use core\database\MySqlConnection;

class Model
{
    protected MySqlConnection $databaseConnection;

    public function __construct()
    {
        $this->databaseConnection = new MySqlConnection();
    }
}
