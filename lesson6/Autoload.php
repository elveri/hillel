<?php

spl_autoload_register('Autoload::loadFromDir');

class Autoload
{
    public static function loadFromDir(string $name)
    {
        $path =  'class/'. str_replace('\\', '/', $name) . '.php';

        if (file_exists($path)) {
            require_once $path;
            return true;
        }
        return false;
    }
}