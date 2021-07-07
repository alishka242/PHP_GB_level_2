<?php

use PHPUnit\Framework\TestCase;
use app\models\entities\Product;

class ProductTest extends TestCase
{
    public function testProduct(){
        $name = "Чай";
        $product = new Product($name);
        $this->assertEquals($name, $product->name);
    }

    public function testProductNameClass()
    {
        $nameClass = Product::class;
        $appPos = strpos($nameClass, "app\\");
        //var_dump($nameClass);
        //$this->assertTrue($appPos);
        $this->assertEquals(0, $appPos);
    }
}