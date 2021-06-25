<?php

namespace app\models;

class User extends DBModel
{
    protected $login;
    protected $pass;
    protected $cokie;

    protected $props = [
        'login' => false,
        'pass' => false
    ];

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