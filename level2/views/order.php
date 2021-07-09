<div class="order">
    <h2>Оформление заказа</h2>
    <?php if ($params['message'] != '✔ Заказ оформлен') : ?>
        <p><?= $params['message'] ?></p> <br>
        <form action="/order/sendOrder" method="post">
            <div class="orderForm">
                <span>Имя</span><input name="name" type="text" placeholder="name">
                <span>Телефон</span><input name="phone" type="phone" placeholder="phone">
                <span>email</span><input name="email" type="email" placeholder="email">
                <span>Сумма заказа: <?= $sum ?> руб.</span>
                <input type="submit" name="send" value="Оформить заказ">
            </div>
        </form>
    <?php elseif ($params['message']) : ?>
        <p><?= $params['message'] ?></p>
    <?php endif; ?>
</div>

<!-- <script>
    let buttonsDel = document.querySelectorAll('.delete');

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
</script> -->