<?php


namespace App\Core;

use App\Traits\HelperTrait;

class Viewer
{
    use HelperTrait;

    public function __construct($object)
    {
        $this->folder = HelperTrait::getName($object);
    }

    public function render($view)
    {
        return VIEWS . '/' . $this->folder . '/' . $view . '.html';
    }
}
