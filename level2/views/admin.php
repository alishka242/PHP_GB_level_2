<h2>Админка</h2>
<div class="ordersAdmin">
    <?php foreach ($admin as $key => $value) : ?>
        <h3>Заказ <?= $value['id'] ?></h3>
        <div class="orderInfoAdmin">
            <p>Заказчик: <?= $value['name'] ?> <?= $value['phone'] ?> </p>
            <p class="orderSess">sesion_id: <?= $value['session_id'] ?></p>
            <p>ID товара: <?= $value['product_id'] ?></p>
            <p>Кол-во товара: <?= $value['count'] ?></p>
            <p>Заказ создан: <?= $value['created_at'] ?></p>
            <p class="orderStatus">Статус заказа: <?= $value['status'] ?></p>
        </div>

    <? endforeach; ?>
</div>