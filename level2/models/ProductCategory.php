<?php

namespace app\models;

class ProductCategory extends DBModel
{
    protected $id;
    protected $name;

    protected $props = [
        'name' => false
    ];

    public static function getTableName()
    {
        return 'product_categories';
    }
}