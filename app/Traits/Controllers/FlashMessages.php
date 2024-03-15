<?php

namespace App\Traits\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

/**
 * Trait FlashMessages
 *
 * This trait provides methods for managing flash messages in Laravel applications.
 * Flash messages are typically used to display temporary messages to users,
 * such as success messages after completing an action or error messages when something goes wrong.
 *
 * @author [Feras Barahmeh]
 */
trait FlashMessages
{
    /**
     * Messages is array container key and value for messages alert
     */
    protected array $messages;

    /**
     * Redirect back with flash session message
     *
     * @param string $key
     * @param string|array|null $params
     * @return RedirectResponse
     */
    public function backWith(string $key, string|array|null $params = null): RedirectResponse
    {
        return Redirect::back()->with($key, $this->getMessage(key: $key, params: $params));
    }

    /**
     * Get message from $messages array by key
     *
     * @param string $key
     * @param string|array|null $params Values for variable content in message
     * @return string message with merged params
     */
    public function getMessage(string $key, string|array|null $params = null): string
    {
        if ($params == null) return $this->messages[$key];
        if (is_string($params)) $params = [':params' => $params];

        return strtr($this->messages[$key], $params);
    }
}
