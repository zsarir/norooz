<?php

namespace app\database;

use PDO;

class Database
{

    public $connection;
    public $statement;
    private $config;
    public function __construct($config, $dbuser = 'root', $dbpassword = 'root')
    {
        $this->config = $config;
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
    public function lastInsertedId()
    {
        return $this->connection->lastInsertId();
    }


    public  function updateTable($tableName,  $params = [], $id)
    {
        $query = '';
        foreach ($params as $key => $value) {
            $query .=  $key . ' = ' . ':'  . $key;
            if ($key !== array_key_last($params)) {
                $query .= ', ';
            }
        }
        $query = "UPDATE " . "`" . $this->config['host'] . "`" . "." . "`" . $tableName . "`" . " SET " . $query . " WHERE ID = :id";
        $params['id'] = $id;
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    public  function insertToTable($tableName,  $params = [])
    {
        $values = '';
        $columns = '';
        foreach ($params as $key => $value) {
            $values .=  ':'  . $key;
            $columns .=  $key;
            if ($key !== array_key_last($params)) {
                $values .= ', ';
                $columns .= ', ';
            }
        }

        $query = "INSERT INTO " . "`" . $this->config['host'] . "`" . "." . "`" . $tableName . "`";
        $query .= "(" . $columns . ") VALUES (" . $values . ");";
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    public  function deleteFromTable($tableName, $id)
    {
        $params = [
            'id' => $id
        ];
        $query = "DELETE FROM  " . "`" . $this->config['host'] . "`" . "." . "`" . $tableName . "`";
        $query .= "WHERE ID = :id";
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }
    public  function selectQuery($tableName, $params)
    {

        $conditions = '';
        foreach ($params as $key => $value) {
            $conditions .=  $key . ' = ' . ':'  . $key;
            if ($key !== array_key_last($params)) {
                $conditions .= ' AND ';
            }
        }
        $query = "SELECT * FROM " . "`" . $this->config['host'] . "`" . "." . "`" . $tableName . "`";
        $query .= "WHERE " . $conditions;
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    public function one()
    {
        return $this->statement->fetch();
    }
    public function all()
    {
        return $this->statement->fetchAll();
    }
}
