<?php

namespace app\controllers;

use app\engine\App;
use app\models\entities\Order;

class OrderController extends Controller
{
    public function actionOrder()
    {
        $session_id = App::call()->session->getId();
        $sum = App::call()->basketRepository->getSumWhere('session_id', $session_id);

        echo $this->render(
            'order',
            [
                'sum' => $sum
            ]
        );
    }

    public function actionSendOrder()
    {
        if ($_POST['name'] && $_POST['phone'] && $_POST['email']) {
            $session_id = App::call()->session->getId();
            $basket = App::call()->basketRepository->getAllWhere('session_id', $session_id);
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];

            foreach ($basket as $key) {
                $order = new Order($name, $phone, $email, $session_id, $key['product_id'], $key['count'], $key['price']);
                App::call()->orderRepository->save($order);
            }
            session_regenerate_id(); //чистит корзину

            echo $this->render(
                'order',
                [
                    'message' => '✔ Заказ оформлен'
                ]
            );
        } else {
            echo $this->render(
                'order',
                [
                    'message' => 'Заполните информацию о себе!'
                ]
            );
        }
    }
}
