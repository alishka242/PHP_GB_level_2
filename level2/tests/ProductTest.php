<?php

use PHPUnit\Framework\TestCase;
use app\models\entities\Product;

class ProductTest extends TestCase
{
    protected $testClass;

    protected function setUp():void
    {
        $this->testClass = Product::class;
    }

    public function testNamespace() {
        $name = explode('\\', $this->testClass);
        $this->assertEquals($name[0], 'app');
    }

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