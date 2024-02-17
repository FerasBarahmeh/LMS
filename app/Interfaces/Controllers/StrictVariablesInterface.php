<?php

namespace App\Interfaces\Controllers;

/**
 * Interface contain variables must be added to Controller
 */
interface StrictVariablesInterface
{
    /**
     * This method provides the constant path for blade views within the controller.
     *
     * @param string $blade The name of the target blade view.
     * @return string The full path to the specified blade view.
     */
    public function bladePath(string $blade): string;
}
