<div class="product">
    <?php if ($product) : ?>
        <h2><?= $product->name ?></h2>
        <img src='/img/catalog/<?= $product->img_name ?>' alt='photo'>
        <p>Описание: <?= $product->description ?></p>
        <p class="productPrice">Цена: <?= $product->price ?> руб.</p>
        <button data-id="<?= $product->id ?>" data-price="<?= $product->price ?>" class="buy">Купить</button>
    <? else : ?>
        <p>Такого товара не существует</p>
    <? endif; ?>
</div>

<script>
    let buttons = document.querySelectorAll('.buy');
    buttons.forEach(elem => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            let price = elem.getAttribute('data-price');
            (
                async () => {
                    const response = await fetch('/basket/add', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json;charset=utf-8'
                        },
                        body: JSON.stringify({
                            id: id,
                            price: price
                        })
                    });
                    const answer = await response.json();
                    document.getElementById('count').innerText = answer.count;
                }
            )();
        })
    });
</script>