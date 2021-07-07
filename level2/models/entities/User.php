<?php

namespace app\models\entities;

use app\models\Model;

class User extends Model
{
    protected $id;
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
}
