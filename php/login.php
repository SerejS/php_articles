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
                                Войти
                            </button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postData = file_get_contents('php://input');
    $user = json_decode($postData, true);
    $conn = new mysqli("mysql.skopa.dev:33600", "root", "6PmH68BzJub6SaY7", "articles");
    $result = $conn->query("SELECT id FROM `user` WHERE login = ".$user["login"]." AND password = ".$user["password"]);
    $row = $result->fetch_row();
    if ($row != null) {
        echo "Ok";
    } else {
        echo "Bruh";
    }
}

?>
<script src="/front/login.js"></script>