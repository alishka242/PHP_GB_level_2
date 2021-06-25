<?php

namespace app\controllers;

use app\models\Product;

class ProductController extends Controller
{
    public function actionCatalog()
    {
        $catalog = Product::getAll();
        $page = $_GET['page'] ?? 0;
        //$catalog = Product::getLimit(($page + 1) * 2);
        echo $this->render(
            'catalog',
            [
                'catalog' => $catalog,
                'page' => ++$page
            ]
        );
    }

    public function actionCard()
    {
        $id = $_GET['id'];
        $product = Product::getOne($id);
        echo $this->render('card', [
            'product' => $product
        ]);
    }


    // public function actionAdd()
    // {
    //     //добавление товара в каталог
    //     echo 'card';
    // }
}
