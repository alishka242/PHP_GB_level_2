<?php

class Products
{
    public $name;
    public $product_id;
    public $category_id;
    public $product_type;
    public $img_name;
    public $description; //описание
    public $brand; //бренд - производитель
    public $structure; //состав
    public $price;
    public $createdAt;
    static $numb = 1;

    public function __construct(
        $name = 'без названия',
        $category_id = null, //1-обувь, 2-игрушки, 3-еда 
        $product_type = null, //1-Кроссовки, 2-шлепки, 3-топ, 4-юбка, 5-кефир, 6-йогурт, 7-игрушки
        // $product_type = null, //1-повседневные, 2-молочный, 3-на выход, 4-сладкое
        $img_name = 'img',
        $description = 'не указано',
        $price = 0,
        $createdAt = '09.06.21 15:30',
        $brand = 'не указан',
        $structure = 'не указан'
    ) {
        $this->name = $name;
        $this->category_id = $category_id;
        $this->product_type = $product_type;
        $this->img_name = $img_name;
        $this->description = $description;
        $this->price = $price;
        $this->createdAt = $createdAt;
        $this->brand = $brand;
        $this->structure = $structure;
    }

    public function getProductCatd()
    {
        $this->product_id = self::$numb;
        echo "Товар {$this->product_id}: {$this->brand} {$this->name}.<br>
        Описание: {$this->description}.<br>
        Состав: {$this->structure}.<br>
        Цена: {$this->price} руб.<br>";
        self::$numb++;
    }
}

class FoodProducts extends Products
{
    public $weight; //вес
    public $taste; //вкус
    public $self_life; //срок годности
    public $date_of_manufacture; //дата изготовления

    public function __construct($name, $category_id, $product_type, $img_name, $description, $price, $createdAt, $brand, $structure, $weight = '0', $taste = null, $self_life = null, $date_of_manufacture = null)
    {
        parent::__construct($name, $category_id, $product_type, $img_name, $description, $price, $createdAt, $brand, $structure);
        $this->weight = $weight;
        $this->taste = $taste;
        $this->self_life = $self_life;
        $this->date_of_manufacture = $date_of_manufacture;
    }

    function getProductInfo()
    {
        echo "Годен до: {$this->self_life}<br><br>";
    }
}

class FootwearProducts extends Products
{
    public $size;
    public $color;
    public $gender;

    public function __construct($name, $category_id, $product_type, $img_name, $description, $price, $createdAt, $brand, $structure, $size, $color, $gender)
    {
        parent::__construct($name, $category_id, $product_type, $img_name, $description, $price, $createdAt, $brand, $structure);
        $this->size = $size;
        $this->color = $color;
        $this->gender = $gender;
    }

    function getProductInfo()
    {
        echo "Размер: {$this->size}<br>
        Цвет: {$this->color}<br>
        Пол: {$this->gender}<br><br>";
    }
}