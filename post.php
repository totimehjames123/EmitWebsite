<?php
session_start();

header("Location: post_preview.php");

//Adding to database
$servername = "localhost";
$username = "id19982279_root";
$password = "<^L1E]}\Iubao%hf";
$database = "id19982279_emit_db";

$connection = new mysqli($servername, $username, $password, $database) or die("failed");


$phoneNumber = $_SESSION['myPhoneNumber'];

$myFullName = "";
$myEmail = "";
$myPhoneNumber = "";
$myDateOfBirth = "";
$myPassword = "";
$myCountry = "";
$myGender = "";
$myProfile = "";




$statement = $connection->prepare("INSERT INTO posts (phoneNumber, images, caption, fullName, profilePicture) VALUES (?, ?, ?, ?, ?)");
$statement->bind_param("sssss", $phoneNumber, $images, $caption, $myFullName, $myProfile);

$images = $_SESSION['MyImages'];
$caption = $_SESSION['MyCaption'];

$sqlDetails = "SELECT * FROM signup WHERE phoneNumber = '$phoneNumber'";
$resultDetails = $connection->query($sqlDetails);

if ($resultDetails->num_rows > 0) {
    // output data of each row
    while($row = $resultDetails->fetch_assoc()) {
        $myFullName = $row['fullName'];
        $myEmail = $row['email'];
        $myPhoneNumber = $row['phoneNumber'];
        $myDateOfBirth = $row['dateOfBirth'];
        $myPassword = $row['newPassword'];
        $myCountry = $row['country'];
        $myGender = $row['gender'];
        $myProfile = '<img src="uploads/'.$row['profilePicture'].'" class="profilepicture">';
    }
}

$statement->execute();
if ($statement->error){
    printf("Error: %s.\n", $statement->error);
}

// echo $phoneNumber;
// echo $images;
// echo $caption;
// echo $myFullName;
// echo $myProfile;


$sqlSelect = "SELECT * FROM posts WHERE phoneNumber = '$phoneNumber'";
$resultSelect = $connection->query($sqlDetails);




// $sql = "SELECT * FROM posts WHERE phoneNumber='$phoneNumber'";
// $result = $connection->query($sql);

$_SESSION['myPhoneNumber'] = $phoneNumber;
$_SESSION['images'] = $images;


if ($resultSelect->num_rows > 0) {
    // output data of each row
    while($row = $resultSelect->fetch_assoc()) {
        $fullNamePost = $row["fullName"];
        $profilePicturePost = $row["profilePicture"];
        $phoneNumberPost = $row["phoneNumber"];
    }
}

$_SESSION['fullNamePost'] = $fullNamePost;
$_SESSION['profilePicturePost'] = $profilePicturePost;
$_SESSION['phoneNumberPost'] = $phoneNumberPost;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['myFullName'];?></title>
    <link rel="stylesheet" href="post.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">     
</head>
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
<body>
    <form action="post_preview.php">
        <button type="submit">See my Post</button>
    </form>
</body>
</html>


