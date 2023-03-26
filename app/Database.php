<?php

class Database
{
    public $dsn;
    public $pdo;

    public function __construct()
    {
        $this->dsn  = "mysql:host=mvc;port=3306;dbname=mvcdb;";
        $this->pdo = new PDO($this->dsn, 'root', 'root');
    }

    public function query($query)
    {
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchall(PDO::FETCH_ASSOC);
    }

    public function insert($query)
    {
        $statement = $this->pdo->prepare($query);
        return $statement->execute();
    }
}
