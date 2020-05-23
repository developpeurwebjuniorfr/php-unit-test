<?php

namespace App\Core;

class Router
{
    public function __construct()
    {
    }

    /**
     * Redirect to an url
     * @param string|null $url
     */
    public static function redirectTo($url = '/'): string
    {
        header('Location: ' . $url);
        exit();
    }
}
