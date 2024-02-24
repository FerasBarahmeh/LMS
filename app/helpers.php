<?php

/**
 * Get current authorized user object
 */
if (! function_exists('user')) {
    function user(): ?\Illuminate\Contracts\Auth\Authenticatable
    {
        return auth()->user();
    }
}
/**
 * Set default image if exists
 */
if (! function_exists('phantomImagePicker')) {
    function phantomImagePicker($url)
    {
        if ($url == null) return asset('backend/assets/img/faces/6.jpg');
        return $url;
    }
}

/**
 * Convert date to mysql format date
 */
if (! function_exists('dateToDBFormat')) {
    function dateToDBFormat($date): string
    {
        return  \Illuminate\Support\Carbon::parse($date)->format('Y/m/d');
    }
}

/**
 *
 */
if (! function_exists('parseDate')) {
    function parseDate($date, $format='M/D/Y'): string
    {
       return $date != null ? \Illuminate\Support\Carbon::parse($date)->format($format) : '';
    }
}
