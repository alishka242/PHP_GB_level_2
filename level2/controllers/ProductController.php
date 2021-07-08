<?php

namespace app\controllers;

use app\engine\App;

class ProductController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('index');
    }

    public function actionCatalog()
    {
        $page =  App::call()->request->getParams()['page'] ?? 0;

        $catalog = App::call()->productRepository->getLimit(($page + 1) * App::call()->config['product_per_page']);
    
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
        $id = App::call()->request->getParams()['id'];

        $product =  App::call()->productRepository->getOne($id);

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
