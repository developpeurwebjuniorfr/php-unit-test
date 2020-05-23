<?php

namespace App\Controllers;

use App\Core\Router;
use App\Repositories\Repository;
use App\Repositories\UserRepository;
use App\Services\UserService;

class UserController
{
    private $repository;

    public function __construct(Repository $repository = null)
    {
        $this->repository = new UserRepository();
    }

    /**
     * Show form inscription
     */
    public function showInscription()
    {
        $users = $this->repository->findAll();
        include('src/Views/User/inscription.html');
    }

    /**
     * Create an user
     */
    public function create()
    {
        if (UserService::isFormCreateUserValid($_POST)) {
            $this->repository->create($_POST);
            Router::redirectTo();
        }
    }
}
