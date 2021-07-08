<p><?= $params['message'] ?></p>
<?php if (!$params['message']) : ?>
    <div class="reg">
        <h2>Регистрация</h2>
        <div class="singInOrReg">
            <form action="/auth/registration/" method="post">
                <input type="text" name="login" placeholder="Логин" class="headerFormInput">
                <input type="text" name="pass" placeholder="Пароль" class="headerFormInput">
                <input type="submit" name="submit" value="Регистрация" class="headerFormInput headerFormBasket">
            </form>
        </div>
    </div>
<? endif; ?>
<br>
<div class="singInOrReg">
    <a href="/auth/singIn">Войти</a>
</div>