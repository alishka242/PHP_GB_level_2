<?php

namespace app\models\repositories;

use app\engine\Session;
use app\models\Repository;
use app\models\entities\User;

class UserRepository extends Repository
{
    public function registration($login, $pass)
    {
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $user = new User($login, $pass);
        (new UserRepository())->save($user);
        return 'Вы успешно зарегистрировались!';
    }

    public function userExist($login)
    {
        $user = $this->getOneWhere('login', $login);
        if ($user) {
            return 'Вы уже зарегистрованны!';
        }
    }

    public function auth($login, $pass)
    {
        $user = $this->getOneWhere('login', $login);
        if (password_verify($pass, $user->pass) && $user != null) {
            (new Session())->set('login', $login);
            return true;
        }
        return true;
    }

    public function isAuth()
    {
        $session = (new Session())->get('login');
        return isset($session);
    }

    public function isAdmin()
    {
        $session = (new Session())->get('login');
        return $session == 'admin';
    }

    public function getName()
    {
        $session = (new Session())->get('login');
        return $session;
    }

    public function getEntityClass()
    {
        return User::class;
    }

    protected function getTableName()
    {
        return 'users';
    }
}
