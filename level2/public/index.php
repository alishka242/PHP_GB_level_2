<?php

use app\models\{Product, User, Basket};
use app\engine\{Db, Autoload};
use app\interfaces\IModel;

include "../config/config.php";
include ROOT . "/engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$product = Product::getOne(7);
$product->delete();
var_dump($product);

// $product = new Product('Книга', 3, 'book.phg', 'Самая интересная книга', 454);
// $product->insert();
// var_dump($product);