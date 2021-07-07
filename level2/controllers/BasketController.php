<?php

namespace app\controllers;

use app\models\entities\Basket;
use app\engine\Request;
use app\engine\Session;
use app\models\repositories\BasketRepository;

class BasketController extends Controller
{
    public function actionIndex()
    {
        $session_id = (new Session())->getId();
        $basket = (new BasketRepository())->getBasket($session_id);
        $sum = (new BasketRepository())->getSumWhere('session_id', $session_id);

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
        $session_id = (new Session)->getId();
        $basket = new Basket($session_id, $product_id, $price);
        (new BasketRepository())->save($basket);

        $response = [
            'success' => 'ok',
            'count' => (new BasketRepository())->getCountWhere('session_id', $session_id)
        ];

        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }

    public function actionDelete()
    {
        $id = (new Request())->getParams()['id'];
        $session_id = (new Session())->getId();
        $basket = (new BasketRepository())->getOne($id);

        if ($session_id == $basket->session_id) {
            (new BasketRepository())->delete($basket);
        } else {
            $error = 'error';
        }

        $response = (new BasketRepository())->returnResponse($session_id);

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function actionPlus()
    {
        $id = (new Request())->getParams()['id'];
        $session_id = (new Session())->getId();
        $basket = (new BasketRepository())->getOne($id);

        if ($session_id == $basket->session_id) {
            (new BasketRepository())->delete($basket);
        } else {
            $error = 'error';
        }
    }

    public function actionMinus()
    {
        //        $id = $_GET['id'];
        //        $this->basket->save();
        //        var_dump($_GET);
        //        die();
    }
}
