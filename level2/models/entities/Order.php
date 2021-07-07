<?php

namespace app\models\entities;

use app\models\Model;

class Order extends Model
{
    protected $id;
    protected $userName;
    protected $phone;
    protected $email;
    protected $session_id;
    protected $product_id;
    protected $status;

    protected $props = [
        'userName' => false,
        'phone' => false,
        'email' => false,
        'session_id' => false,
        'product_id' => false,
        'status' => false
    ];
}
