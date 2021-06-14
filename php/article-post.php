<?php
include "../secrets.php";
global $host, $username, $pass, $db;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    $postData = file_get_contents('php://input');
    $user = json_decode($postData, true);
    $conn = new mysqli($host, $username, $pass, $db);
    $stmt = $conn->prepare('INSERT INTO article(author, title, body, created) VALUES('.$_SESSION["user_id"].', "' . $user["title"] . '", "' . $user["body"] . '", NOW())')
    or die('Запрос не удался: ' . $conn->error);
    $stmt->execute();
    $result = $conn->query('SELECT id FROM article WHERE title = "' . $user["title"].'"') or die($conn->error);
    $row = $result->fetch_assoc();
    if ($row) {
        http_response_code(200);
        echo '{"article_id": '.$row['id'].'}';
    } else {
        http_response_code(500);
        echo "Error";
    }
}