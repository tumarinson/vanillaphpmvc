<?php

namespace core\database;

final class MySqlConnection
{
    private array $config;

    private \PDO $connection;

    public function __construct(?string $absolutePathToConfig = null)
    {
        $absolutePathToConfig = $absolutePathToConfig ?? APP_ROOT_DIRECTORY . 'config/db.php';
        $this->config = require_once $absolutePathToConfig;
        $this->connection = new \PDO($this->config['dsn'], $this->config['username'], $this->config['password']);
    }

    public function query(string $query): bool|array
    {
        $statement = $this->connection->query($query);

        return $statement->fetchAll();
    }
}
