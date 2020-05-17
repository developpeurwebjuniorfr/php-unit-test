<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Repository;


class UserRepository extends Repository
{
    const __TABLE = 'users';

    /**
     * Get all users
     * @return array<User>
     */
    public function findAll(): array
    {
        $sql =  'SELECT * FROM ' . self::__TABLE;
        $query = $this->getPdo()->prepare($sql);
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_CLASS, User::class);
    }

    /**
     * Find user by id
     * @param int $id
     * @return User
     */
    public function findOne(int $id)
    {
        $sql =  'SELECT * FROM ' . self::__TABLE . ' WHERE id = :id';
        $query = $this->getPdo()->prepare($sql);
        $query->execute([':id' => $id]);
        return $query->fetchAll(\PDO::FETCH_CLASS, User::class);
    }

    /**
     * Create an user with an array
     * @param array $params
     * @return bool
     */
    public function create(array $params)
    {
        $params[':password'] = password_hash($params[':password'], PASSWORD_DEFAULT);
        $sql = "INSERT INTO " . self::__TABLE . "(firstname, lastname, age, email, password) VALUES (:firstname, :lastname, :age, :email, :password)";
        $query = $this->getPdo()->prepare($sql);
        return $query->execute($params);
    }
}
