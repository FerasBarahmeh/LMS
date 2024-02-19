<?php

namespace App\FileKit;

trait HelperFileKit
{
    /**
     * Append message validation to messages validation
     *
     * @param array $arrayMessages
     * @param $name
     * @param $value
     * @return void
     */
    protected function appendMessageValidation(array &$arrayMessages, $name, $value): void
    {
        $arrayMessages[$name] = $value;
    }

    protected function deleteMessageValidation(array &$arrayMessages, $name): bool
    {
        if (array_key_exists($name, $arrayMessages)) {
            unset($arrayMessages[$name]);
            return true;
        }
        return false;
    }

    /**
     * Method to generate folder name like class name (using namespace)
     *
     * @param string $namespace namespace  for the class you what sort
     * @return string
     */
    protected function getFolderName(string $namespace): string
    {
        if (! class_exists($namespace))
            return strtolower($namespace);

        return strtolower(class_basename(get_class(new $namespace))).'s' ;
    }
}
