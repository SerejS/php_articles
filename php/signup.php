<?php
$title = "Регистрация";
include "base.php";
?>

<div id="modal" class="modal">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div id="modal-box" class="box"></div>
    </div>
</div>
<script src="/front/overlay.js"></script>
<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-half">
                <div class="box">
                    <div class="field">
                        <p class="control has-icons-left has-icons-right">
                            <input id="login" class="input" type="text" placeholder="Логин">
                            <span class="icon is-small is-left">
                                   <img src="/front/person.svg">
                                </span>
                        </p>
                    </div>
                    <div class="field">
                        <p class="control has-icons-left">
                            <input id="password" class="input" type="password" placeholder="Пароль">
                            <span class="icon is-small is-left">
                                    <img src="/front/lock.svg">
                                </span>
                        </p>
                    </div>
                    <div class="field">
                        <p class="control">
                            <button id="login-button" class="button is-success">
                                Зарегистрироваться
                            </button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="/front/signup.js"></script>