<?php

namespace app\models;

class ProductCategory extends Model
{
    public $id;
    public $name;

    public function getTableName()
    {
        return 'product_categories';
    }
}