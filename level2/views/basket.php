<h2>Корзина</h2>
<div class="basket">
    <div>
        <?php foreach ($basket as $key => $value) : ?>
            <?php if ($value['count'] > 0) : ?>
                <div class="basketItem" id="<?= $value['basket_id'] ?>">
                    <img src="/img/catalog/<?= $value['img_name'] ?>" width="50" alt="img">
                    <div class="basketItemInfo">

                        <h3><a href="/product/<?= $value['product_id'] ?>">
                                <?= $value['product_name'] ?>
                            </a>
                        </h3>
                        <p><?= $value['price'] ?> руб.</p>
                        <p>
                            <span>Кол-во: <span id='productCount'><?= $value['count'] ?></span></span>
                            <button data-id="<?= $value['basket_id'] ?>" class="minus">-</button>
                            <button data-id="<?= $value['basket_id'] ?>" class="plus">+</button>
                        </p>
                    </div>
                    <button data-id="<?= $value['basket_id'] ?>" class="delete">Удалить</button>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <?php if ($sum) : ?>
        <div>
            <h3>Сумма заказа: <span id="sum"><?= $sum ?></span> руб.</h3>

            <a class="order-button" href="/order/order/<?= $params['sum'] ?>">
                <h3>Перейти к оформлению</h3>
            </a>
        <?php else : ?>
            <p>Пока ничего нет</p>
        <?php endif; ?>
        </div>
</div>

<script>
    let buttonsDel = document.querySelectorAll('.delete');
    let buttonsMinus = document.querySelectorAll('.minus');
    let buttonsPlus = document.querySelectorAll('.plus');

    buttonsDel.forEach(elem => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (
                async () => {
                    const response = await fetch('/basket/delete', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json;charset=utf-8'
                        },
                        body: JSON.stringify({
                            id: id
                        })
                    });
                    const answer = await response.json();
                    document.getElementById('count').innerText = answer.count;
                    document.getElementById('sum').innerText = answer.sum;
                    document.getElementById(id).remove();
                }
            )();
        })
    });

    buttonsMinus.forEach(elem => {
        elem.addEventListener('click', (event) => {
            let id = elem.getAttribute('data-id');
            (
                async () => {
                    const response = await fetch('/basket/minus', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json;charset=utf-8'
                        },
                        body: JSON.stringify({
                            id: id
                        })
                    });
                    const answer = await response.json();
                    document.getElementById('sum').innerText = answer.sum;
                    const target = event.target.closest('.basketItem');
                    if (!Number(answer.productCount)) {
                        document.querySelector('#count').innerText = answer.count;
                        document.getElementById(id).remove();
                       
                    } else {
                        target.querySelector('#productCount').innerText = answer.productCount;
                    }
                }
            )();
        })
    });

    buttonsPlus.forEach(elem => {
        elem.addEventListener('click', (event) => {
            let id = elem.getAttribute('data-id');
            (
                async () => {
                    const response = await fetch('/basket/plus', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json;charset=utf-8'
                        },
                        body: JSON.stringify({
                            id: id
                        })
                    });
                    const answer = await response.json();
                    document.getElementById('sum').innerText = answer.sum;
                    const target = event.target.closest('.basketItem');
                    target.querySelector('#productCount').innerText = answer.productCount;
                }
            )();
        })
    });
</script>