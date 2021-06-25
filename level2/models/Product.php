<?php

namespace app\models;

class Product extends DBModel
{
    protected $name;
    protected $category_id;
    protected $img_name;
    protected $description;
    protected $price;
    // public $createdAt; - почему-то с этой строкой не добавляет новую строку в таблицу при insert.

    protected $props = [
        'name' => false,
        'category_id' => false,
        'img_name' => false,
        'description' => false,
        'price' => false
    ];

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