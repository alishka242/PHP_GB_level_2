<p>SHOP SM</p>
<?php if ($params['allow']) : ?>
    <div>
        <h3><?= $params['name'] ?></h3>
        <a href="logout">[Выход]</a>
    </div>
<?php else : ?>
    <div class="singInOrReg">
        <a href="/sing_in">Войти</a> 
        <a href="/registration">Зарегистрироваться</a>
    </div>
<?php endif; ?>