<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
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
            session_start();
            if (isset($_SESSION["user_id"])) {
                echo "<a class=\"navbar-item\" href=\"/article/new/\">Написать статью</a>";
            }
            ?>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <?php
                    if (isset($_SESSION["user_id"])) {
                        echo "<a class='button is-light' href='/php/logout.php'>Выйти</a>";
                    } else {
                        echo "<a class='button is-light' href='/php/signup.php'>Зарегистрироваться</a>";
                        echo "<a class='button is-light' href='/php/login.php'>Войти</a>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</nav>