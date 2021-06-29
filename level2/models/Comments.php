<?php

namespace app\models;

class Comments extends DBModel
{
    protected $id;
    protected $user_id;
    protected $text;

    protected $props = [
        'user_id' => false,
        'text' => false
    ];

    public static function getTableName()
    {
        return 'comments';
    }
}