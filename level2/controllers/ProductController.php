<?php

namespace app\controllers;

use app\models\Product;
use app\models\repositories\ProductRepository;

class ProductController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('index');
    }

    public function actionCatalog()
    {
        $page = $_GET['page'] ?? 0;
        $catalog = (new ProductRepository())->getLimit(($page + 1) * PRODUCT_PER_PAGE);
    
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

        $product = (new ProductRepository())->getOne($id);

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
