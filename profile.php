<?php
//Uploading image to a folder
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    
} else {

}

//Adding to database
$servername = "localhost";
$username = "id19982279_root";
$password = "<^L1E]}\Iubao%hf";
$database = "id19982279_emit_db";

$connection = new mysqli($servername, $username, $password, $database);

$statement = $connection->prepare("INSERT INTO signup (fullname, email, phoneNumber, newPassword, dateOfBirth, country, gender, profilepicture) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$statement->bind_param("ssssssss", $fullname, $email, $phoneNumber, $newPassword, $dateOfBirth, $country, $gender, $profilepicture);

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phoneNumber = $_POST['phonenumber'];
$newPassword = $_POST['newpassword'];
$confirmPassword = $_POST['confirmpassword'];
$dateOfBirth = $_POST['dateOfBirth'];
$country = $_POST['country'];
$gender = $_POST['gender'];
$profilepicture = $_FILES["fileToUpload"]["name"];

if ($newPassword === $confirmPassword){
    $newPassword = $newPassword;
}
else{
    $newPassword = NULL;
    header('Location: password_error.php');
}

$statement->execute();

$sql = "SELECT * FROM signup WHERE phoneNumber=$phoneNumber";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $myFullName = $row['fullName'];
        $myEmail = $row['email'];
        $myPhoneNumber = $row['phoneNumber'];
        $myDateOfBirth = $row['dateOfBirth'];
        $myCountry = $row['country'];
        $myGender = $row['gender'];
        $myProfile = '<img src="uploads/'.$row['profilePicture'].'" class="profilepicture">';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body> 
    <header>
        <h1 class="logo">eMit</h1>
        <h1 class="title"><i class="fa fa-user"></i> me</h1>
    </header>
    <div class="profile">
        <div class="profilePictureBox">
            <?php echo $myProfile;?>
        </div>
        <div class="details">
            <h1 style="color: orangered; font-size: 60px; text-shadow: 2px 3px 5px darkslategray; margin-top: 0;" class="profileDescription">Personal Info</h1>
            <p class="fullname"><i class="fa fa-user"></i><?php echo $myFullName;?></p>
            <p class="email"><i class="fa fa-envelope"></i><?php echo $myEmail;?></p>
            <p class="phoneNumber"><i class="fa fa-phone"></i><?php echo $myPhoneNumber;?></p>
            <p class="dateOfBirth"><i class="fa fa-calendar"></i><?php echo $myDateOfBirth;?></p>
            <p class="country"><i class="fa fa-location"></i><?php echo $myCountry;?></p>
            <p class="gender">
                    <?php if($myGender == 'male'){
                        echo '<i>&#128104;</i>';
                    }
                    elseif ($myGender == 'female'){
                        echo '<i>&#128105;</i>';
                    } 
                    else{
                        echo "<i>&#9895;&#65039</i>";
                    }
                    ?>
                <?php echo ucfirst($myGender);?>
            </p>
            <form action="login.php">
                <input type="submit" value="Continue to Log In" class="button">
            </form>
        </div>
    </div>
</body>
</html>


