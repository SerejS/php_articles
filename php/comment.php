<article class="media">
    <?php for ($i = 0; $i < $nesting; $i++) {
        echo '<figure class="media-left"></figure>';
    } ?>
    <div class="media-content">
        <div class="content">
            <p>
                <strong><?php echo $comment['login'] ?></strong>
                <br>
                <?php echo $comment['comment'] ?>
                <br>
                <small>
                    <a onclick="open_reply(<?php echo $comment['id'] ?>)">Ответить</a>
                    · <?php echo $comment['created'] ?></small>
            </p>
        </div>
    </div>
</article>

<?php
$replies = $conn->query("SELECT comment.*, login FROM comment JOIN user ON user.id=comment.author where root=" . $comment['id']);
$nesting++;
foreach ($replies as $comment):
    include('comment.php');
endforeach;
$nesting--;
?>
