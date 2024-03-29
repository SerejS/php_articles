<?php
include "../secrets.php";
global $host, $username, $pass, $db;
$conn = new mysqli($host, $username, $pass, $db);
$result = $conn->query("SELECT article.*, login FROM article JOIN user on article.author=user.id WHERE article.id = " . $_GET["id"]);
$row = $result->fetch_assoc();

$title = $row['title'];
include "base.php";
if (isset($_SESSION["user_id"])) { ?>
    <div id="modal" class="modal">
        <div class="modal-background"></div>
        <div class="modal-content">
            <div id="modal-box" class="box"></div>
        </div>
    </div>
    <script src="/front/overlay.js"></script>
    <script>let article_id = <?php echo $_GET['id'] ?></script>
<?php } ?>

<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column is-10 is-offset-1">
                <div id="box" class="box">
                    <h3 id="title" class="title is-3 mb-2"><?php echo $row['title'] ?></h3>
                    <strong><?php echo $row['login'] ?></strong>
                    <p><?php echo $row['created'] ?></p>
                    <hr>
                    <p id="body"><?php echo $row['body'] ?></p>
                    <?php if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] == $row['author']) { ?>
                        <div id="buttons" class="buttons mb-0 mt-3">
                            <button id="edit-button" class="button is-info is-light">Редактировать</button>
                            <button id="delete-button" class="button is-danger is-light">Удалить</button>
                        </div>
                        <script src="/front/article.js"></script>
                    <?php } ?>
                </div>
                <div class="box">

                    <?php
                    $result = $conn->query("SELECT comment.*, login FROM comment JOIN user ON user.id=comment.author where root is null and article=" . $_GET["id"]);
                    foreach ($result as $comment):
                        $nesting = 1;
                        include "comment.php";
                    endforeach;

                    if (isset($_SESSION["user_id"])) {
                        $comment["id"] = 0;
                        include("reply.php");
                        echo "<script src='/front/comment.js'></script>";
                    } else {
                        ?>
                        <script>let open_reply = (_) => {
                            }  </script>
                        <article class="media">
                            <figure class="media-left"></figure>
                            <div class="media-content">
                                <hr>
                                <p>Войдите что б оставить комментарий</p>
                            </div>
                        </article>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>