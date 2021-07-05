<?php

namespace app\models;

use app\engine\Session;

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
        if (password_verify($pass, $user->pass) && $user != null){
            (new Session())->set('login', $login);
            return true;    
        }
        return true;
    }

    public static function isAuth()
    {
        $session = (new Session())->get('login');
        return isset($session);
    }

    public static function isAdmin()
    {
        $session = (new Session())->get('login');
        return $session == 'admin';
    }

    public static function getName()
    {
        $session = (new Session())->get('login');
        return $session;
    }

    public static function getTableName()
    {
        return 'users';
    }
}
