<?php

namespace app\models\entities;

use app\models\Model;

class Order extends Model
{
    protected $id;
    protected $name;
    protected $phone;
    protected $email;
    protected $session_id;
    protected $product_id;
    protected $count;
    protected $price;
    protected $status;

    protected $props = [
        'name' => false,
        'phone' => false,
        'email' => false,
        'session_id' => false,
        'product_id' => false,
        'count' => false,
        'price' => false,
        'status' => false
    ];

    public function __construct($name = null, $phone = null, $email = null, $session_id = null, $product_id = null, $count = 1, $price = null, $status = 'новый')
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->session_id = $session_id;
        $this->product_id = $product_id;
        $this->count = $count;
        $this->price = $price;
        $this->status = $status;
    }
}
