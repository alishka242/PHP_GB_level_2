<p>SHOP SM</p>
<?php if ($isAuth) : ?>
    <div>
        <h3><?= $params['userName'] ?></h3>
        <a href="/auth/logout">[Выход]</a>
    </div>
<?php else : ?>
    <form action="/auth/login/" method="post">
        <input type="text" name="login" placeholder="Логин">
        <input type="text" name="pass" placeholder="Пароль">
        <input type="submit" name="submit" value="Войти">
    </form>
    <!-- <div class="singInOrReg">
        <a href="/sing_in">Войти</a> 
        <a href="/registration">Зарегистрироваться</a>
    </div> -->
<?php endif; ?>