<?php

namespace app\models;

class Basket extends Model
{
    public $id;
    public $user_id;
    public $product_id;
    public $session_id;
    public $count;
    public $price;

    public function getTableName()
    {
        return 'basket';
    }
}