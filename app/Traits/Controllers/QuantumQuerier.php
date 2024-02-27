<?php

namespace App\Traits\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
/**
 * Trait containing properties and methods commonly used across controllers.
 *
 * @property string $COLLECTION Name of the collection for the media package in this controller
 * @property string $BLADES_HUB Root directory for blades in this controller
 * @property string $Home URL for the main page in this controller
 *
 * @method string retrieveBlade() Return the blade with the specified tail blade
 * @method void setBladeHub() Set the main directory for blades in this controller
 * @method void setCollection() Set the name of the collection for the media package (for files)
 * @method void setHome() Set the main URL for this controller
 * @method RedirectResponse toHome() Return a redirect response to the home page for this controller
 */
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
    protected static string $HOME;

    public function __construct()
    {
        static::setBladeHub();
        static::setCollection();
        static::setHOME();
    }

    public static function retrieveBlade(string $tail): string
    {
        return static::$BLADES_HUB . $tail;
    }

    public static function toHOME(string $keyMessage, $message): RedirectResponse
    {
        return Redirect::intended(self::$HOME)->with($keyMessage, $message);
    }

    public static function setBladeHub()
    {
        //
    }

    public static function setCollection()
    {
        //
    }

    public static function setHome()
    {
        //
    }

}
