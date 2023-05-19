<?php
session_start();
header("Location: ". $_SERVER['HTTP_REFERER']);

//Adding to database
$servername = "localhost";
$username = "id19982279_root";
$password = "<^L1E]}\Iubao%hf";
$database = "id19982279_emit_db";

$connection = new mysqli($servername, $username, $password, $database);


$postId = $_SESSION['postId'];
$sql = "DELETE FROM posts WHERE postId = '$postId'";
$sqlDelete = "DELETE FROM response_post WHERE postId = '$postId'";

if ($connection->query($sql)){
    echo "You deleted 1 of your posts!";
}
if ($connection->query($sqlDelete)){
    echo "You deleted 1 of your posts!";
}

?>