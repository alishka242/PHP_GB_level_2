<p>SHOP SM</p>
<?php if ($isAuth) : ?>
    <div class="singInOrReg">
        <h3><?= $params['userName'] ?></h3>
        <a href="/auth/logout">Выход</a>
    </div>
<?php else : ?>
    <div class="singInOrReg">
        <a href="/auth/singIn">Войти</a>
        <a href="/auth/formRegistration">Зарегистрироваться</a>
    </div>
<?php endif; ?>