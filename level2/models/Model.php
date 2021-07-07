<?php
//хранилище данных
namespace app\models;

abstract class Model
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
