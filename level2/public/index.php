<?php
session_start();

use app\models\{Product, User, Basket, DBModel};
use app\engine\{Autoload, TwigRender, Render, Request};

include "../config/config.php";
include ROOT . "/engine/Autoload.php";
include ROOT . '/vendor/autoload.php';

spl_autoload_register([new Autoload(), 'loadClass']);

$request = new Request();

$controllerName = $request->getControllerName() ?: 'product';
$actionName = $request->getActionName();

//если бутет работать то коммент удалить
// $url = explode('/', $_SERVER['REQUEST_URI']);
// $controllerName = $url[1] ?: 'product';
// $actionName = $url[2];

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
// $where = DBModel::getWhere('category_id', 2);
// $product = Product::getAll($where);

//INSERT GET
$product = new Product('Книга', 1, 'book.png', 'Самая интересная книга', 454);
$product->save();

$product = new Product('Вода', 3, 'water.png', 'Самая чистая вода', 54);
$product->save();

$product = new Product('Банан', 2, 'banana.png', 'Спелый банан', 19);
$product->save();

//DELETE
// $product = Product::getOne(7);
// $product->delete();