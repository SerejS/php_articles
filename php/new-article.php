<?php
$title = "Добавление статьи";
include "base.php"
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
        <div class="columns">
            <div class="column is-10 is-offset-1">
                <div class="field">
                    <p class="control">
                        <input id="title" class="input" type="text" placeholder="Введите название">
                    </p>
                </div>
                <div class="field">
                    <p class="control">
                        <textarea class="textarea" placeholder="Напишите статью"></textarea>
                    </p>
                </div>
                <button id="save" class="button is-info is-light">Сохранить</button>
                <script src="/front/overlay.js"></script>
                <script src="/front/new-article.js"></script>
            </div>
        </div>
    </div>
</section>