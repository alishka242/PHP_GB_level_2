<?php

use app\engine\Db;
use app\engine\Request;
use app\engine\Session;
use app\models\repositories\OrderRepository;
use app\models\repositories\BasketRepository;
use app\models\repositories\ProductRepository;
use app\models\repositories\UserRepository;

// define('DS', DIRECTORY_SEPARATOR);
// define('ROOT', dirname(__DIR__));
// define('CONTROLLER_NAMESPACE', 'app\\controllers\\');
// define('VIEWS_DIR', '../views/');
// define('PRODUCT_PER_PAGE', 2);

return [
    'root' => dirname(__DIR__),
    'ds' => DIRECTORY_SEPARATOR,
    'controllers_namespaces' => 'app\\controllers\\',
    'product_per_page' => 2,
    'views_dir' => dirname(__DIR__) . "/views/",
    'components' => [
        'db' => [
            'class' => Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'root',
            'password' => 'Not.8fat',
            'database' => 'wild_shop',
            'charset' => 'utf8'
        ],
        'request' => [
            'class' => Request::class
        ],
        'basketRepository' => [
            'class' => BasketRepository::class
        ],
        'productRepository' => [
            'class' => ProductRepository::class
        ],
        'userRepository' => [
            'class' => UserRepository::class
        ],
        'orderRepository' => [
            'class' => OrderRepository::class
        ],
        'session' => [
            'class' => Session::class
        ]
    ]

];
