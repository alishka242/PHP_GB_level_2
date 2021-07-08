<?php

namespace app\models\repositories;

use app\models\Repository;
use app\models\entities\User;
use app\engine\App;

class UserRepository extends Repository
{
    public function registration($login, $pass)
    {
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $user = new User($login, $pass);
        App::call()->userRepository->save($user);
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
            App::call()->session->set('login', $login);
            return true;
        }
        return true;
    }

    public function isAuth()
    {
        $session = App::call()->session->get('login');
        return isset($session);
    }

    public function isAdmin()
    {
        $session = App::call()->session->get('login');
        return $session == 'admin';
    }

    public function getName()
    {
        $session = App::call()->session->get('login');
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
