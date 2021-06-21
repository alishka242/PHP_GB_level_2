<?php

namespace app\models;

class Product extends Model
{
    public $id;
    public $name;
    public $category_id;
    public $img_name;
    public $description;
    public $price;
    // public $createdAt; - почему-то с этой строкой не добавляет новую строку в таблицу при insert.

    public function __construct($name = null, $category_id = null, $img_name = null, $description = null, $price = null)
    {
        $this->name = $name;
        $this->category_id = $category_id;
        $this->img_name = $img_name;
        $this->description = $description;
        $this->price = $price;
    }

    protected static function getTableName()
    {
        return 'products';
    }
}