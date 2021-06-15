<?php

namespace app\engine;

class Autoload
{
    function loadClass($className)
    {
        $className = str_replace("app\\", "../", $className);
        $className = str_replace("\\", "/", $className);
        $className .= ".php";
        var_dump($className);

        if (file_exists($className)) {
            include $className;
        }
    }
}