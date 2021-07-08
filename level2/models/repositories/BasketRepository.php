<?php

namespace app\models\repositories;

use app\models\entities\Basket;
use app\models\Repository;
use app\engine\App;

class BasketRepository extends Repository
{
    public function getBasket($session_id)
    {
        $sql = "SELECT b.id as basket_id, b.product_id AS product_id, b.price AS price, b.`count` AS `count`, p.name AS product_name, p.img_name AS img_name FROM basket AS b, products AS p WHERE (b.`session_id` = '{$session_id}' OR b.`user_id` = 'user_id') AND b.product_id = p.id";

        return App::call()->db->queryAll($sql);
    }

    public function getEntityClass()
    {
        return Basket::class;
    }

    protected function getTableName()
    {
        return 'basket';
    }

    public function returnResponse($session_id, $productCount)
    {
        $error = "ok";

        $sum = $this->getSumWhere('session_id', $session_id);

        if ($sum) {
            $response = [
                'succes' => $error,
                'count' => $this->getCountWhere('session_id', $session_id),
                'productCount' => $productCount,
                'sum' => $sum,
            ];
        } else {
            $response = [
                'succes' => $error,
                'count' => $this->getCountWhere('session_id', $session_id),
                'sum' => 0,
            ];
        }

        return $response;
    }
}
