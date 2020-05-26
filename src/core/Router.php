<?php

namespace App\Core;

use App\Controllers\UserController;

class Router
{
    public function __construct()
    {
    }

    /**
     * Redirect to an url
     * @param string|null $url
     */
    public static function redirectTo($url = '/', $messages = [])
    {
        $_SESSION['messages'] = $messages;
        header('Location: ' . $url);
        exit();
    }

    /**
     * Intercept query url to use the correct Controller
     */
    public static function handle()
    {
        $route = isset($_GET['r']) ? $_GET['r'] : null;
        $action = isset($_GET['action']) ? $_GET['action'] : null;
        switch ($route) {
            case 'user':
                self::getUserAction($action);
                break;
            default:
                self::getUserAction();
                break;
        }
    }

    /**
     * Get the action from the request uri and call the right action from the Controller
     * @param string|null action
     */
    private static function getUserAction($action = null)
    {
        $userController = new UserController();
        switch ($action) {
            case 'create':
                $userController->create();
                break;

            default:
                $userController->showInscription();
                break;
        }
    }
}
