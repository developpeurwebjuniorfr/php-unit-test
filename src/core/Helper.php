<?php

namespace App\Core;

class Helper
{

    /**
     * Check is inscription form is not empty
     * @return bool
     */
    public static function isFormCreateUserValid(array $params): bool
    {
        return isset($params[':firstname']) && !empty($params[':firstname'])
            && isset($params[':lastname']) && !empty($params[':lastname'])
            && isset($params[':age']) && !empty($params[':firstname'])
            && isset($params[':password']) && !empty($params[':password'])
            && isset($params[':email']) && !empty($params[':email']);
    }

    /**
     * Redirect to a $url
     * @param string|null $url
     */
    public static function redirectTo($url = '/'): string
    {
        header('Location: ' . $url);
        exit();
    }
}
