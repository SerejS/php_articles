<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postData = file_get_contents('php://input');
    $user = json_decode($postData, true);
    $conn = new mysqli("mysql.skopa.dev:33600", "root", "6PmH68BzJub6SaY7", "articles");
    $stmt = $conn->prepare('INSERT INTO `user`(login, password) VALUES("' . $user["login"] . '", "' . $user["password"] . '")')
    or die('Запрос не удался: ' . $conn->error);
    if ($stmt->execute()) {
        http_response_code(200);
        echo "Ok";
    } else {
        http_response_code(500);
        echo "Error";
    }
}