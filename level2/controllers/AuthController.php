<?php

namespace app\controllers;

use app\models\repositories\UserRepository;
use app\engine\Request;
use app\engine\Session;

class AuthController extends Controller
{
    public function actionSingIn()
    {
        if ((new UserRepository())->isAuth()) {
            echo $this->render(
                'sing_in',
                [
                    'message' => '✔ Вы успешно прошли авторизацию!',
                    // 'page' => ++$page
                ]
            );
        } else {
            echo $this->render('sing_in');
        }
    }

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

    public function actionLogout()
    {
        $session = new Session();
        $session->regenerate();
        $session->destroy();
        header("Location: " . $_SERVER['HTTP_REFERER']);
        die();
    }

    public function actionFormRegistration($message = '')
    {
        echo $this->render(
            'registration',
            [
                'message' => $message
            ]
        );
    }

    public function actionRegistration()
    {
        $request = new Request();
        $login = $request->getParams()['login'];
        $pass = $request->getParams()['pass'];
        $userExist = (new UserRepository())->userExist($login);
        if ($login != null && $pass != null) {
            if ($userExist) {
                $this->actionFormRegistration($userExist);
            } else {
                $message = (new UserRepository())->registration($login, $pass);
                $this->actionFormRegistration($message);
            }
        }
    }
}
