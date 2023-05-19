<?php

session_start();
header("Location: post.php");

$caption = $_POST['caption'];
$image = $_FILES["fileToUpload"]["name"];


//Uploading image to a folder
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    $_SESSION['MyImages'] = $image;
    $_SESSION['MyCaption'] = $caption;
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);


$_SESSION['MyImages'] = $image;
$_SESSION['MyCaption'] = $caption;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Created</title>
    <style>
        body{
            box-sizing: border-box;
            background: rgb(169, 243, 169);;
        }
        form button{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            height: 100px;
            border-radius: 50px;
            background: green;
            color: white;
            border: none;
            font-family: Arial;
            font-size: 30px;
        }
        form button:hover{
            opacity: 0.7;
        }

        @media screen and (max-width: 767px){
            form{
                font-size: 10px;
                width: 100%;
            }
            form button{
                font-size: small;
                height: 40px;
                width: 80%;
            }
        }
    </style>
</head>
<body>
    <form action="post.php">
        <button type="submit">Continue to Post</button>
    </form>
</body>
</html>