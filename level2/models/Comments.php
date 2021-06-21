<?php

namespace app\models;

class Comments extends Model
{
    public $id;
    public $user_id;
    public $text;

    public static function getTableName()
    {
        return 'comments';
    }
}