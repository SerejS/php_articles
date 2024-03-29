<?php
$title = "Авторизация";
include "base.php";
?>

<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-half">
                <div class="box">
                    <div class="field">
                        <p class="control has-icons-left has-icons-right">
                            <input id="login" class="input" type="text" placeholder="Логин">
                            <span class="icon is-small is-left">
                                   <img src="../front/person.svg">
                                </span>
                        </p>
                    </div>
                    <div class="field">
                        <p class="control has-icons-left">
                            <input id="password" class="input" type="password" placeholder="Пароль">
                            <span class="icon is-small is-left">
                                    <img src="../front/lock.svg">
                                </span>
                        </p>
                    </div>
                    <div class="field">
                        <p class="control">
                            <button id="login-button" class="button is-success">
                                Войти
                            </button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="../front/login.js"></script>