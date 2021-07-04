<h2>Каталог</h2>
<div class="catalogPage">
    <?php foreach ($catalog as $key => $value) : ?>
        <div>
            <a href="/product/card/?id=<?= $value['id'] ?>">
                <h3><?= $value['name'] ?></h3>
                <img src='/img/catalog/<?= $value['img_name'] ?>' alt='photo' width='150' height="150">
                <p>Цена: <?= $value['price'] ?></p>
            </a>
            <button data-id="<?= $value['id'] ?>" data-price="<?= $value['price'] ?>" class="buy">Купить</button>
            <!-- <form action="/basket/add" method="post">
                <input type="text" name="id" hidden value="<?= $value['id'] ?>">
                <input type="text" name="price" hidden value="<?= $value['price'] ?>">
                <button type="submit">Купить</button>
            </form> -->
        </div>
    <? endforeach; ?>
</div>
<a href="/product/catalog/?page=<?= $page ?>">Еще</a>

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