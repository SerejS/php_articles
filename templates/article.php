<?php
require_once("../checkauth.php");

use function Auth\isAuth;

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
$conn = new mysqli("localhost", "root", "tlf96602", "news");
$result = $conn->query("SELECT * FROM news WHERE id = " . $_POST["id"]);
$row = $result->fetch_assoc();
?>

<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column is-10 is-offset-1">
                <div id="box" class="box">
                    <h3 id="title" class="title is-3 mb-2">{{ .Article.Title }}</h3>
                    <strong>{{ .Article.Author }}</strong>
                    <p>{{ .Article.Time.Format "2006.01.02" }}</p>
                    <hr>
                    <p id="body">{{ .Article.Body }}</p>
                    {{ if .IsOwner }}
                    <div id="buttons" class="buttons mb-0 mt-3">
                        <button id="edit-button" class="button is-info is-light">Редактировать</button>
                        <button id="delete-button" class="button is-danger is-light">Удалить</button>
                    </div>
                    <script src="/front/article.js"></script>
                    {{ end }}
                </div>
                <div class="box">
                    {{ range .Article.Comments }}
                    {{ template "comment" . }}
                    {{ end }}


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