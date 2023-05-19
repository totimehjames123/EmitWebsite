<?php
//start session
session_start();

header("Location: " . $_SERVER['HTTP_REFERER']);
header("Location: blog.php");

//Adding to database
$servername = "localhost";
$username = "id19982279_root";
$password = "<^L1E]}\Iubao%hf";
$database = "id19982279_emit_db";

$connection = new mysqli($servername, $username, $password, $database);
$comment = $_POST['comment'];
$postId = $_SESSION['postIdComment'];
$profilePicture = $_SESSION['myProfile'];
$fullName = $_SESSION['myFullName'];

 $postIdComment = "";

$statement = $connection->prepare("INSERT INTO response_post (postId, comment, profilePictureComment, fullNameComment) VALUES (?, ?, ?, ?)");
$statement->bind_param("ssss", $postId, $comment, $profilePicture, $fullName);

$comment = $comment;
$postId = $postId;
$statement->execute();
echo "1 comment has been sent successfully!";

// header("Location: " . $_SERVER['HTTP_REFERER']);



?>