<?php
include "../secrets.php";
global $host, $username, $pass, $db;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    $postData = file_get_contents('php://input');
    $comment = json_decode($postData, true);
    $conn = new mysqli($host, $username, $pass, $db);
    $comment['root'] = $comment['root'] == null ? "NULL" : $comment['root'];
    $stmt = $conn->prepare("INSERT INTO comment(root, author, `comment`, article, created) VALUES(".$comment['root'].", ".$_SESSION["user_id"].", \"".$comment["body"]." \", ".$comment["article_id"].", NOW())")
    or die('Запрос не удался: ' . $conn->error);
    $stmt->execute();
    $result = $conn->query('SELECT id FROM comment WHERE `comment` = "' . $comment["body"].'"') or die($conn->error);
    http_response_code(200);
    $row = $result->fetch_assoc();
}
