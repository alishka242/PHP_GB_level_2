<?php

namespace app\engine;

class Autoload
{
    function loadClass($className)
    {
        $className = str_replace(['app\\', '\\'], [ROOT . DS, DS], $className) . ".php";

        if (file_exists($className)) {
            include $className;
        }
    }
}