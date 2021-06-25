<?php

namespace app\models;

class Basket extends DBModel
{
    protected $user_id;
    protected $product_id;
    protected $session_id;
    protected $count;
    protected $price;

    protected $props = [
        'user_id' => false,
        'product_id' => false,
        'session_id' => false,
        'count' => false,
        'price' => false
    ];

    public static function getBasket()
    {
        
    }

    public static function getTableName()
    {
        return 'basket';
    }
}