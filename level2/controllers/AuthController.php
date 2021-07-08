<?php

namespace app\controllers;

use app\models\repositories\UserRepository;
use app\engine\Request;
use app\engine\Session;
use app\engine\App;

class AuthController extends Controller
{
    public function actionSingIn()
    {
        if (App::call()->userRepository->isAuth()) {
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
        $login = App::call()->request->getParams()['login'];
        $pass = App::call()->request->getParams()['pass'];
        
        if (App::call()->userRepository->auth($login, $pass)) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            die();
        } else {
            die('Не верный логин или пароль');
        }
    }

    public function actionLogout()
    {
        App::call()->session->regenerate();
        App::call()->session->destroy();
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
        $login = App::call()->request->getParams()['login'];
        $pass = App::call()->request->getParams()['pass'];
        $userExist = App::call()->userRepository->userExist($login);
        if ($login != null && $pass != null) {
            if ($userExist) {
                $this->actionFormRegistration($userExist);
            } else {
                $message = App::call()->userRepository->registration($login, $pass);
                $this->actionFormRegistration($message);
            }
        }
    }
}
