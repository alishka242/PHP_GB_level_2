<?php

namespace app\models;

use app\engine\Db;

class Basket extends DBModel
{
    protected $id;
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

    public function __construct($session_id = null, $product_id = null, $price = null, $count = 1, $user_id = null)
    {
        $this->user_id = $user_id;
        $this->session_id = $session_id;
        $this->product_id = $product_id;
        $this->count = $count;
        $this->price = $price;
    }

    public static function getBasket($session_id)
    {
        $sql = "SELECT b.product_id AS product_id, b.price AS price, b.`count` AS `count`, p.name AS product_name, p.img_name AS img_name FROM basket AS b, products AS p WHERE (b.`session_id` = '{$session_id}' OR b.`user_id` = 'user_id') AND b.product_id = p.id";
        return Db::getInstance()->queryAll($sql);
    }

    public static function getTableName()
    {
        return 'basket';
    }
}
