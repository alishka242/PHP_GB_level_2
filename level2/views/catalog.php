<h2>Каталог</h2>
<div class="catalogPage">
    <?php foreach ($catalog as $key => $value) : ?>
        <div>
        <a href="/?c=product&a=card&id=<?= $value['id'] ?>">
            <h3><?= $value['name'] ?></h3>
            <img src='/img/catalog/<?= $value['img_name'] ?>' alt='photo' width='150'>
            <p>Цена: <?= $value['price'] ?></p>
        </a>
        <a href="/buy/<?=$value['id']?>" name="buy">Купить</a>
        </div>
    <? endforeach; ?>
</div>
<a href="/?c=product&a=catalog&page=<?=$page?>">Еще</a>