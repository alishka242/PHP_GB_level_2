<?php

use app\models\{Product, User, Basket};
use app\engine\{Autoload};

include "../config/config.php";
include ROOT . "/engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    $controller->runAction($actionName);
} else echo '404';

//UPDATE
// $product = Product::getOne(7);
// $product->price = 23;
// $product->save();

//INSERT GET
// $product = new Product('Книга', 3, 'book.png', 'Самая интересная книга', 454);
// $product->save();


//DELETE
// $product = Product::getOne(7);
// $product->delete();