<?php

namespace app\controllers;

use app\models\repositories\UserRepository;
use app\models\User;
use app\engine\Request;
use app\engine\Session;

class AuthController extends Controller
{
    public function actionLogin()
    {
        $request = new Request();
        $login = $request->getParams()['login'];
        $pass = $request->getParams()['pass'];
        if ((new UserRepository())->auth($login, $pass)) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            die();
        } else {
            die('Не верный логин или пароль');
        }
    }
//auth/register
    public function actionLogout()
    {
        $session = new Session();
        ($session)->regenerate();
        ($session)->destroy();
        header("Location: " . $_SERVER['HTTP_REFERER']);
        die();
    }
}