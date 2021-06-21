<?php

namespace app\models;

class User extends Model
{
    public $id;
    public $login;
    public $pass;
    public $cokie;

    public function __construct($login = null, $pass = null, $cokie = null)
    {
        $this->login = $login;
        $this->pass = $pass;
        $this->cokie = $cokie;
    }

    public static function getTableName()
    {
        return 'users';
    }
}