<?php
require_once ("../checkauth.php");

use function Auth\isAuth;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php echo "Test" ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
</head>
<body>
<nav class="navbar is-dark" role="navigation" aria-label="main navigation">
    <div id="navbarBasic" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="/php/articles.php">
                Все статьи
            </a>

            <?php
                 if (isAuth($_COOKIE)) {
                     echo "<a class=\"navbar-item\" href=\"/article/new/\">Написать статью</a>";
                 }
            ?>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <?php
                        if (isAuth($_COOKIE)) {
                            echo "<a class='button is-light' href='/logout/'>Выйти</a>";
                        } else {
                            echo "<a class='button is-light' href='/signup/'>Зарегистрироваться</a>";
                            echo "<a class='button is-light' href=/login/'>Войти</a>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</nav>
<!--{{ template "content" .Content }}-->
</body>
</html>