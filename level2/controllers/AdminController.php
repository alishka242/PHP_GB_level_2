<?php

namespace app\controllers;

use app\engine\App;

class AdminController extends Controller
{
    public function actionIndex()
    {
        // $session_id = App::call()->session->getId();
        $admin = App::call()->orderRepository->getAll();

        echo $this->render(
            'admin',
            [
                'admin' => $admin,
            ]
        );
    }

    public function getOrders()
    {
        # code...
    }
}
