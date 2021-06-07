<article class="media">
    <figure class="media-left"></figure>
    <div class="media-content">
        <div class="content">
            <p>
                <strong><?php echo $comment['login']?></strong>
                <br>
                <?php echo $comment['comment']?>
                <br>
                <small>
                    <a onclick="open_reply(<?php echo $comment['id']?>)">Ответить</a>
                    · <?php echo $comment['create']?></small>
            </p>
        </div>
        {{ template "reply" . }}
        {{ range .Comments }}
        {{ template "comment" . }}
        {{ end }}
    </div>
</article>