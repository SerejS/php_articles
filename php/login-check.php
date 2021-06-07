<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postData = file_get_contents('php://input');
    $user = json_decode($postData, true);
    $conn = new mysqli("mysql.skopa.dev:33600", "root", "6PmH68BzJub6SaY7", "articles");
    $result = $conn->query('SELECT id FROM `user` WHERE login = "' . $user["login"] . '" AND password = "' . $user["password"] . '"')
    or die('Запрос не удался: ' . $conn->error);
    $row = $result->fetch_row();
    if ($row != null) {
        session_start();
        $_SESSION['user_id'] = $row[0];
        http_response_code(200);
        echo "Ok";
    } else {
        http_response_code(403);
        echo "Error";
    }
}

