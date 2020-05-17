<?php

require_once('autoload.php');

use App\Controllers\UserController;

$uController = new UserController();

include './src/Views/head.html';
$route = isset($_GET['r']) ? $_GET['r'] : null;
switch ($route) {
    case 'create':
        $uController->create();
        break;
    default:
        $uController->showInscription();
        break;
}

include './src/Views/head.html';
