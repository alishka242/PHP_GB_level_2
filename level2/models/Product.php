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

    protected function getTableName()
    {
        return 'products';
    }
}