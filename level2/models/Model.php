<?php

namespace app\models;

use app\interfaces\IModel;

abstract class Model implements IModel
{
    protected $props = [];

    public function __set($name, $value)
    {
        //TODO проверить существует ли в props такое поле 
        $this->props[$name] = true;
        $this->$name = $value;
    }

    public function __get($name)
    {
        //TODO проверить существует ли в props такое поле 
        return $this->$name;
    }

    public function __isset($name)
    {
        return isset($this->$name);
    }
}
