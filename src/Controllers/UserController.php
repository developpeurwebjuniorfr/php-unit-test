<?php

namespace App\Controllers;

use App\Core\Router;
use App\Core\Viewer;
use App\Repositories\UserRepository;
use App\Services\UserService;

class UserController
{
    private $repository;
    private $viewer;

    public function __construct()
    {
        $this->repository = new UserRepository();
        $this->viewer = new Viewer($this);
    }

    /**
     * Show form inscription
     */
    public function showInscription()
    {
        $users = $this->repository->findAll();
        include($this->viewer->render('inscription'));
    }

    /**
     * Create an user
     */
    public function create()
    {
        $params = $_POST;
        if (UserService::isFormCreateUserValid($params)) {
            if ($this->repository->create($params)) {
                Router::redirectTo('/', ["L'enregistrement a réussi."]);
            }

            Router::redirectTo('/', ["L'enregistrement a échoué."]);
        }
    }
}
