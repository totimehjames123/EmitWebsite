<?php
session_start();

$servername = "";
$username = "id19982279_root";
$password = "<^L1E]}\Iubao%hf";
$database = "id19982279_emit_db";

$connection = new mysqli($servername, $username, $password, $database);

//Initialize all variables
$myFullName = "";
$myEmail = "";
$myPhoneNumber = "";
$myDateOfBirth = "";
$myPassword = "";
$myCountry = "";
$myGender = "";
$myProfile = "";




$phoneNumber = $_POST['phonenumber'];
$password = $_POST['password'];

$_SESSION['myPhoneNumber'] = $phoneNumber;
$_SESSION['myPassword'] = $password;

$sql = "SELECT * FROM signup WHERE phoneNumber='$phoneNumber' AND newPassword='$password'";
$result = $connection->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
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

//Set session variables
$_SESSION['myFullName'] = $myFullName;
$_SESSION['myEmail'] = $myEmail;
$_SESSION['myPhoneNumber'] = $myPhoneNumber;
$_SESSION['myDateOfBirth'] = $myDateOfBirth;
$_SESSION['myPassword'] = $myPassword;
$_SESSION['myCountry'] = $myCountry;
$_SESSION['myGender'] = $myGender;
$_SESSION['myProfile'] = $myProfile;

if ($password !== $myPassword){
    header("Location: invalid_login.php");
}
elseif ($phoneNumber !== $myPhoneNumber){
    header("Location: invalid_login.php");
}
elseif ($phoneNumber !== $myPhoneNumber && $password !== $myPassword){
    header("Location: invalid_login.php");
}
else{
    $remarks = "Logged In Successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In Successfully</title>
    <style>
        body{
            box-sizing: border-box;
            background: rgb(169, 243, 169);;
        }
        form button{
            width: 100%;
            height: 70px;
            border-radius: 50px;
            background: green;
            color: white;
            border: none;
            font-family: Arial;
            font-size: 30px;
        }
        form{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%); 
            text-align: center;
            padding: 10%;
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
    <form action="blog.php">
        <h1 style="color: green; font-family: Arial;"><?php echo $remarks;?></h1>
        <button type="submit">Get Started</button>
    </form>
</body>
</html>