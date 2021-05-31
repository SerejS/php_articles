<?php include "base.php";?>

<?php
$conn = new mysqli("localhost", "root", "root", "news");
$result = $conn->query("SELECT id, author, title, create_date FROM article");
?>

<section class="section">
    <?php foreach ($result as $row):?>
    <div class="container">
        <div class="columns is-half">
            <div class="column">
                <article class="box">
                    <a class="title is-3 mb-2" href="/article.php/<?php echo $row['id']?>/">
                        <?php echo $row['title'] ?>
                    </a>
                    <br>
                    <strong><?php echo $row['author'] ?></strong>
                    <p><?php echo $row['create_date'] ?></p>
                </article>
            </div>
        </div>
    </div>
    <?php endforeach;?>
</section>