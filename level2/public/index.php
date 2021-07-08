<?php
session_start();

use app\models\{Repository};
use app\models\repositories\{BasketRepository, ProductRepository, UserRepository};
use app\models\entities\{Basket, Product, User};
use app\engine\{Autoload, TwigRender, Render, Request};

include "../config/config.php";
//include ROOT . "/engine/Autoload.php";
include ROOT . '/vendor/autoload.php';

//spl_autoload_register([new Autoload(), 'loadClass']);

$request = new Request();

$controllerName = $request->getControllerName() ?: 'product';
$actionName = $request->getActionName();

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new Render());
    $controller->runAction($actionName);
} else echo '404';

//UPDATE
// $product = Product::getOne(1);
// $product->price = 12;
// $product->save();

//WHERE
// $where = Repository::getWhere('category_id', 2);
// $product = Product::getAll($where);

//INSERT GET
$product = new Product('Книга', 1, 'book.png', 'Самая интересная книга', 454);
(new ProductRepository())->save($product);

$product = new Product('Вода', 3, 'water.png', 'Самая чистая вода', 54);
(new ProductRepository())->save($product);

$product = new Product('Банан', 2, 'banana.png', 'Спелый банан', 19);
(new ProductRepository())->save($product);

//DELETE
// $product = Product::getOne(7);
// $product->delete();