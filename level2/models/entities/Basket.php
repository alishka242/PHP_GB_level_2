<?php

namespace app\models\entities;

use app\models\Model;

class Basket extends Model
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
}
