<?php

namespace app\models;

class Order extends Model
{
    public $id;
    public $userName;
    public $phone;
    public $email;
    public $session_id;
    public $product_id;
    public $status;

    public function getTableName()
    {
        return 'orders';
    }
}
