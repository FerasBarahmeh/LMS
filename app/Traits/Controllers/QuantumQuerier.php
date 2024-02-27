<?php

namespace App\Traits\Controllers;

trait QuantumQuerier
{

    /**
     * Collection name in "spatie media" library
     */
    protected static string $COLLECTION;

    /**
     * Blade dir for the controller
     */
    protected static string $BLADES_HUB;

    /**
     * Home url
     */
    protected static string $Home;

    public function __construct()
    {
        static::setBladeHub();
        static::setCollection();
        static::setHome();
    }

    public static function retrieveBlade(string $tail): string
    {
        return static::$BLADES_HUB . $tail;
    }

    public static function setBladeHub()
    {
    }

    public static function setCollection()
    {
    }

    public function setHome()
    {
    }

    public static function getCollection(): string
    {
        return self::$COLLECTION;
    }

    public static function getBladesHub(): string
    {
        return self::$BLADES_HUB;
    }

    public function getHome(): string
    {
        return self::$Home;
    }

}
