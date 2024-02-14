<?php

namespace App\Http\Controllers\Traits;

trait Helper
{
    public function getView($name): string
    {
        return self::VIEW_PATH . $name;
    }
}
