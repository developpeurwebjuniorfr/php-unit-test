<?php

use App\Services\UserService;
use PHPUnit\Framework\TestCase;

final class UserServiceTest extends TestCase
{

    public function testIsFormValideShould()
    {
        $params = [
            ':firstname'    => 'test prénom',
            ':lastname'       => 'test nom',
            ':age'       => '42',
            ':email'     => 'theemail@.fr',
            ':password'  => 'theP@ssw0rd'
        ];
        $result = UserService::isFormCreateUserValid($params);
        $this->assertTrue($result);
    }
}
