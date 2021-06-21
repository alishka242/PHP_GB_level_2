<?php

namespace app\models;

class ProductCategory extends Model
{
    public $id;
    public $name;

    public static function getTableName()
    {
        return 'product_categories';
    }
}