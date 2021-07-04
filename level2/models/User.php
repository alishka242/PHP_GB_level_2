<?php

namespace app\models;

class User extends DBModel
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

    public static function auth($login, $pass)
    {
        $user = User::getOneWhere('login', $login);
        if ($pass == $user->pass && $user != null){
            $_SESSION['login'] = $login;
            return true;    
        }
        return true;
    }

    public static function isAuth()
    {
        return isset($_SESSION['login']);
    }

    public static function isAdmin()
    {
        return $_SESSION['login'] == 'admin';
    }

    public static function getName()
    {
        return $_SESSION['login'];
    }

    public static function getTableName()
    {
        return 'users';
    }
}
