<?php

namespace app\models\entities;

use app\models\Model;

class Comment extends Model
{
    protected $id;
    protected $user_id;
    protected $text;

    protected $props = [
        'user_id' => false,
        'text' => false
    ];
}