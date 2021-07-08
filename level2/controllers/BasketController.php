<?php

namespace app\controllers;

use app\models\entities\Basket;

use app\models\repositories\BasketRepository;
use app\engine\App;

class BasketController extends Controller
{
    public function actionIndex()
    {
        $session_id = App::call()->session->getId();
        $basket = App::call()->basketRepository->getBasket($session_id);
        $sum = App::call()->basketRepository->getSumWhere('session_id', $session_id);

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
        $product_id = App::call()->request->getParams()['id'];
        $price = App::call()->request->getParams()['price'];
        $session_id = App::call()->session->getId();
        $basket = new Basket($session_id, $product_id, $price);

        if ($session_id == $basket->session_id) {
            // $productBasket = (new BasketRepository())->getOneWhereAnd('session_id', $session_id, 'product_id', $product_id);
            // if ($productBasket->id) {
            //     $productBasket->count = $productBasket->count + 1;
            //     (new BasketRepository())->save($productBasket);
            // } else {
                App::call()->basketRepository->save($basket);
            // }
        } else {
            $error = 'error';
        }
        $response = [
            'success' => 'ok',
            'count' => App::call()->basketRepository->getCountWhere('session_id', $session_id)
        ];

        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        die();
    }

    public function actionDelete()
    {
        $id = App::call()->request->getParams()['id'];
        $session_id = App::call()->session->getId();
        $basket = App::call()->basketRepository->getOne($id);

        if ($session_id == $basket->session_id) {
            App::call()->basketRepository->delete($basket);
        } else {
            $error = 'error';
        }

        $response = App::call()->basketRepository->returnResponse($session_id, $id);

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function actionMinus()
    {
        $id = App::call()->request->getParams()['id'];
        $session_id = App::call()->session->getId();
        $basket = App::call()->basketRepository->getOne($id);

        if ($session_id == $basket->session_id) {
            App::call()->basketRepository->minus($basket);
        } else {
            $error = 'error';
        }

        $productCount = App::call()->basketRepository->getProductCountWhere($id);
        if ($productCount == 0) {
            App::call()->basketRepository->delete($basket);
        }

        $response = (new BasketRepository())->returnResponse($session_id, $productCount);
        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function actionPlus()
    {
        $id = App::call()->request->getParams()['id'];
        $session_id = App::call()->session->getId();
        $basket = App::call()->basketRepository->getOne($id);

        if ($session_id == $basket->session_id) {
            App::call()->basketRepository->plus($basket);
        } else {
            $error = 'error';
        }
        $productCount = App::call()->basketRepository->getProductCountWhere($id);
        $response = App::call()->basketRepository->returnResponse($session_id, $productCount);
        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}
