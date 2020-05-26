<?php

namespace App\Services;

class UserService
{

    /**
     * Check is inscription form is not empty
     * @param array params
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
}
