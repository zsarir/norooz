<?php

namespace app;

use PDO;

class Database
{

    public $connection;
    public $statement;
    public function __construct($config, $dbuser = 'root', $dbpassword = 'root')
    {

        $dsn  = 'mysql:' . http_build_query($config['database'], '', ';');
        $this->connection = new PDO($dsn, $dbuser, $dbpassword, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    public function fetchAll()
    {
        return $this->statement->fetchAll();
    }

    public function find()
    {
        return $this->statement->fetch();
    }
}
