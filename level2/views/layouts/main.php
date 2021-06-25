<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="shortcut icon" href="img/favicon.png" type="image/png">
</head>

<body>
    <header class="header">
        <?= $header ?>
    </header>
    <div class="wrapper">
        <nav>
            <?= $menu ?>
        </nav>
        <main>
            <?= $content ?>
        </main>
    </div>
    <footer>
        <?= $footer ?>
    </footer>
</body>

</html>