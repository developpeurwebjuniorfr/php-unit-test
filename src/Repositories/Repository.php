<?php

namespace App\Repositories;

abstract class Repository
{

    private  $pdo;

    public function __construct()
    {
        try {
            if (is_null($this->pdo)) {
                $this->pdo = new \PDO('mysql:host=localhost;dbname=unit-test', 'unit-test', 'unit-test');
                $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            }
            return $this->pdo;
        } catch (\PDOException $e) {
            echo 'Échec de la connexion : ' . $e->getMessage();
            exit;
        }
    }

    protected function getPdo()
    {
        return $this->pdo;
    }

    abstract protected function findOne(int $id);
    abstract protected function findAll();
}
