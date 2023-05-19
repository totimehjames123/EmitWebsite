<?php
session_start();
header("Location: " . $_SERVER['HTTP_REFERER']);
//Adding to database
$servername = "localhost";
$username = "id19982279_root";
$password = "<^L1E]}\Iubao%hf";
$database = "id19982279_emit_db";

$connection = new mysqli($servername, $username, $password, $database);
$postId = $_SESSION['postIdComment'];
// $sql = "INSERT INTO posts (like_post) VALUE (1) WHERE postId = $postId";
$sql = "UPDATE posts SET like_post = like_post + 1 WHERE postId = $postId";
$result = $connection->query($sql);


?>