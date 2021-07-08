<?php

namespace app\engine;

class Autoload
{
    function loadClass($className)
    {
        $fileName = str_replace(['app\\', '\\'], [App::call()->config['root'] . App::call()->config['ds'], App::call()->config['ds']], $className) . ".php";

        if (file_exists($fileName)) include $fileName;
    }
}