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

if (! function_exists('phantomImagePicker')) {
    function phantomImagePicker($url)
    {
        if ($url == null) return asset('backend/assets/img/faces/6.jpg');
        return $url;
    }
}
