<p>SHOP SM</p>
<?php if ($isAuth) : ?>
    <div class="singInOrReg">
        <h3><?= $params['userName'] ?></h3>
        <a href="/auth/logout">Выход</a>
    </div>
<?php else : ?>
    <div class="singInOrReg">
        <form action="/auth/login/" method="post">
            <input type="text" name="login" placeholder="Логин" class="headerFormInput">
            <input type="text" name="pass" placeholder="Пароль" class="headerFormInput">
            <input type="submit" name="submit" value="Войти" class="headerFormInput headerFormBasket">
        </form>
        <a href="/registration">Зарегистрироваться</a>
    </div>
<?php endif; ?>