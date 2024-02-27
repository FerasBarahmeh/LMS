<?php

namespace App\Interfaces\Controllers;

/**
 * Interface contain variables must be added to Controller
 */
interface QuantumQuerierInterface
{
    /**
     * Retrieves tail blade file based on the provided tail name.
     */
    public static function retrieveBlade(string $tail): string;

    public static function setBladeHub(): void;

    public static function setCollection(): void;

    public static function setHome(): void;

}
