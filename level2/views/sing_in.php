<p><?= $params['message'] ?></p>
<?php if (!$params['message']) : ?>
    <div class="singIn">
        <h2>Вход</h2>
        <div class="singInOrReg">
            <form action="/auth/login/" method="post">
                <input type="text" name="login" placeholder="Логин" class="headerFormInput">
                <input type="text" name="pass" placeholder="Пароль" class="headerFormInput">
                <input type="submit" name="submit" value="Войти" class="headerFormInput headerFormBasket">
            </form>
        </div>
    </div>
    <br>
    <div class="singInOrReg">
        <a href="/auth/formRegistration">Зарегистрироваться</a>
    </div>
<? endif; ?>