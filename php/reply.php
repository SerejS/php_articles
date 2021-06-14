<?php if ($comment['id'] == 0){?>
<article id="reply-<?php echo $comment["id"]?>" class="media reply mb-3">
<?php } else {?>
<article id="reply-<?php echo $comment["id"]?>" class="media reply is-hidden mb-3">
<?php }?>

    <figure class="media-left"></figure>
    <div class="media-content">
        <div class="field">
            <p class="control">
                        <textarea id="reply-area-<?php echo $comment["id"]?>"
                                  class="textarea"
                                  placeholder="Напишите комментарий"></textarea>
            </p>
        </div>

    <?php if ($comment["id"] == 0) {?>
        <a class="button is-info is-light"
           onclick="new_comment(0)">Комментировать</a>

    <?php } else {?>
        <a class="button is-info is-light"
           onclick="new_comment(<?php echo $comment["id"].','.$comment["root"] ?>)">Ответить</a>
        <a class="button is-danger is-light"
           onclick="close_reply(<?php echo $comment["id"]?>)">Отменить</a>
    <?php }?>
    </div>

</article>
