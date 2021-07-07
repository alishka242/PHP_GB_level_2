<?php

namespace app\models\entities;

use app\models\Model;

class ProductCategory extends Model
{
    protected $id;
    protected $name;

    protected $props = [
        'name' => false
    ];
}