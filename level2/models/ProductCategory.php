<?php

namespace app\models;

class ProductCategory extends DBModel
{
    protected $name;

    protected $props = [
        'name' => false
    ];

    public static function getTableName()
    {
        return 'product_categories';
    }
}