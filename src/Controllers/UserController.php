<?php

namespace App\Controllers;

use App\Core\Helper;
use App\Repositories\Repository;
use App\Repositories\UserRepository;

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
        if (Helper::isFormCreateUserValid($_POST)) {
            $this->repository->create($_POST);
            Helper::redirectTo();
        }
    }
}
