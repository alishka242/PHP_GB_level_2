<?php

namespace app\controllers;

use app\models\Basket;
use app\engine\Request;
use app\models\User;

class BasketController extends Controller
{
    public function actionIndex()
    {
        $basket = Basket::getBasket(session_id());
        $sum = Basket::getSumWhere('session_id', session_id());

        echo $this->render(
            'basket',
            [
                'basket' => $basket,
                'sum' => $sum
            ]
        );
    }

    public function actionAdd()
    {
        $request = new Request();
        $product_id = $request->getParams()['id'];
        $price = $request->getParams()['price'];
        // $user_name = null;
        // if (User::isAuth()){
        //     $user_name = User::getName();
        //     $user_id = User::getOneWhere('login', $user_name)['id'];
        // }

        $session_id = session_id();

        (new Basket($session_id, $product_id, $price))->save();

        $response = [
            'success' => 'ok',
            'count' => Basket::getCountWhere('session_id', session_id())
        ];

        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }

    public function actionCountDown()
    {
        $id = $_GET['id'];
        var_dump($_GET);
        die();
    }

    public function actionCountUp()
    {
        $id = $_GET['id'];
        $this->basket->save();
        var_dump($_GET);
        die();
    }
    public function actionDelete()
    {
        $product_id = $_GET['id'];
        $basket = Basket::getBasket(session_id());
        $basket->delete();
        header("Location: /basket");
        die();
    }
}
