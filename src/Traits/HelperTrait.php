<?php

namespace App\Traits;

trait HelperTrait
{
    /**
     * Retreive model/table name by is class
     * @param object
     */
    public static function getName($object)
    {
        $name = "";
        if (strpos((new \ReflectionClass($object))->getShortName(), 'Controller') !== false) {
            $name =  str_replace('Controller', '', (new \ReflectionClass($object))->getShortName());
        } else if (strpos((new \ReflectionClass($object))->getShortName(), 'Repository') !== false) {
            $name =  str_replace('Repository', '', (new \ReflectionClass($object))->getShortName());
        }

        return $name;
    }
}
