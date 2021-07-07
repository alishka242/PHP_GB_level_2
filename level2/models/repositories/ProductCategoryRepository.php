<?php

namespace app\models\repositories;

use app\models\entities\ProductCategory;
use app\models\Repository;

class ProductCategoryRepository extends Repository
{
    public function getEntityClass(): string
    {
        return ProductCategory::class;
    }

    protected function getTableName(): string
    {
        return 'product_categories';
    }
}