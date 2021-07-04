<?php

namespace app\controllers;

use app\models\Basket;

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
        $data = json_decode(file_get_contents('php://input'));
        $product_id = $data->id;
        $price = $data->id;

        $session_id = session_id();
        //$product_id = $_POST['id'];
        //$price = $_POST['price'];

        (new Basket($session_id, $product_id, $price))->save();
        // header("Location: " . $_SERVER['HTTP_REFERER']);
        // die();
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
