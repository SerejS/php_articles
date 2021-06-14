<?php
include "base.php";
include "../secrets.php";
global $host, $username, $pass, $db;

$conn = new mysqli($host, $username, $pass, $db);
$result = $conn->query("SELECT article.id, title, `user`.login as author, created FROM article JOIN `user` on article.author=user.id");
echo $conn->error;
?>

<section class="section">
    <?php foreach ($result as $row): ?>
        <div class="container">
            <div class="columns is-half">
                <div class="column">
                    <article class="box">
                        <a class="title is-3 mb-2" href="/php/article.php?id=<?php echo $row['id'] ?>">
                            <?php echo $row['title'] ?>
                        </a>
                        <br>
                        <strong><?php echo $row['author'] ?></strong>
                        <p><?php echo $row['created'] ?></p>
                    </article>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</section>