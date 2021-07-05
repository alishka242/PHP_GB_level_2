<?php

namespace app\controllers;

use app\models\User;
use app\engine\Request;

class AuthController extends Controller
{
    public function actionLogin()
    {
        $request = new Request();
        $login = $request->getParams()['login'];
        $pass = $request->getParams()['pass'];
        if (User::auth($login, $pass)) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            die();
        } else {
            die('Не верный логин или пароль');
        }
    }
//auth/register
    public function actionLogout()
    {
        session_regenerate_id();
        session_destroy();
        header("Location: " . $_SERVER['HTTP_REFERER']);
        die();
    }
}