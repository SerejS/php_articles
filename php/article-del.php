<?php
include "../secrets.php";
global $host, $username, $pass, $db;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postData = file_get_contents('php://input');
    $art = json_decode($postData, true);
    $conn = new mysqli($host, $username, $pass, $db);
    $stmt = $conn->prepare('DELETE FROM article WHERE id = ' . $art['article_id'])
    or die('Запрос не удался: ' . $conn->error);
    if ($stmt->execute()) {
        http_response_code(200);
        echo "Ok";
    } else {
        http_response_code(500);
        echo "Error";
    }
}