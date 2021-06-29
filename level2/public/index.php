<?php

use app\models\{Product, User, Basket, DBModel};
use app\engine\{Autoload, TwigRender, Render};

include "../config/config.php";
include ROOT . "/engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

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
$where = DBModel::getWhere('category_id', 2);
$product = Product::getAll($where);
var_dump($product);

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