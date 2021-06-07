<?php
require_once("../checkauth.php");

use function Auth\isAuth;
use function Auth\isOwner;

include "base.php";

if (isAuth($_COOKIE)) { ?>
    <div id="modal" class="modal">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div id="modal-box" class="box"></div>
        </div>
    </div>
    <script src="/front/overlay.js"></script>
    <script>let article_id = <?php echo $_GET['id'] ?>}</script>
<?php } ?>

<?php
$conn = new mysqli("mysql.skopa.dev:33600", "root", "6PmH68BzJub6SaY7", "articles");
$result = $conn->query("SELECT article.*, login FROM article JOIN user on article.author=user.id WHERE article.id = ". $_GET["id"]);
$row = $result->fetch_assoc();
?>

<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column is-10 is-offset-1">
                <div id="box" class="box">
                    <h3 id="title" class="title is-3 mb-2"><?php echo $row['title']?></h3>
                    <strong><?php echo $row['login']?></strong>
                    <p><?php echo $row['created']?></p>
                    <hr>
                    <p id="body"><?php echo $row['body']?></p>
                    <?php if (isOwner($row['author'])) {?>
                    <div id="buttons" class="buttons mb-0 mt-3">
                        <button id="edit-button" class="button is-info is-light">Редактировать</button>
                        <button id="delete-button" class="button is-danger is-light">Удалить</button>
                    </div>
                    <script src="/front/article.js"></script>
                    <?php }?>
                </div>
                <div class="box">

                    <?php
                    $result = $conn->query("SELECT comment.*, login FROM comment JOIN user ON user.id=comment.author where article=".$_GET["id"]);
                    foreach ($result as $comment):
                        include "comment.php";
                    endforeach
                    ?>

                    <?php
                    if (isAuth($_COOKIE)) {
                        include("reply.php");
                        echo "<script src='/front/comment.js'></script>";
                    } else {
                        ?>
                        <script>let open_reply = (_) => {
                            }  </script>
                        <article class="media">
                            <figure class="media-left"></figure>
                            <div class="media-content">
                                <p>Войдите что б оставить комментарий</p>
                            </div>
                        </article>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>