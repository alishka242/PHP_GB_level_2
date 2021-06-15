<?php

use app\models\{Product, User, Basket};
use app\engine\{Db, Autoload};
use app\interfaces\IModel;

include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$product = new Product(new Db());
$product->getOne(15);
//$product->getAll();

$user = new User(new Db());
$user->getOne(2);
$user->getAll();
$user->insert(1, 'admin', '123');
$user->delete(9);

$basket = new Basket(new Db());
$basket->update(6, 9, '12kBbjh12', 3, 65, 5);


function foo(IModel $model) {
    $model->getAll();
}

foo($product);
foo($user);