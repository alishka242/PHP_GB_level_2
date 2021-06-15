<?php

namespace app\models;

class Comments extends Model
{
    public $id;
    public $user_id;
    public $text;

    public function getTableName()
    {
        return 'comments';
    }
}