<?php
//start session
session_start();

//Adding to database
$servername = "localhost";
$username = "id19982279_root";
$password = "<^L1E]}\Iubao%hf";
$database = "id19982279_emit_db";

$connection = new mysqli($servername, $username, $password, $database);

$myFullName = "";
$myEmail = "";
$myPhoneNumber = "";
$myDateOfBirth = "";
$myPassword = "";
$myCountry = "";
$myGender = "";
$myProfile = "";


$phoneNumber = $_SESSION['myPhoneNumber'];
$password = $_SESSION['myPassword'];

$sql = "SELECT * FROM signup WHERE phoneNumber='$phoneNumber' AND newPassword='$password'";
$sqlPosts = "SELECT * FROM posts WHERE phoneNumber='$phoneNumber'";
$result = $connection->query($sql);

$resultPost = $connection->query($sqlPosts);

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
    <script>
        function displayDropDown() {
            var create = document.getElementById("create");
            var search = document.getElementById("search");
            create.style.display = "block";
            search.style.display = "block";

            var hide = document.getElementById("hide");
            hide.addEventListener("click", ()=>{
                create.style.display = "none";
                search.style.display = "none";
            });
        }
    </script>      
</head>
<body>
    
<header>
        <h1 class="logo">eMit</h1>
        <form action="blog.php">
            <button type="submit" class="buttonSee">See All Posts</button>
        </form>
        <div class="create" id="create">
            <form action="post_data.php">
                <button> <i class="fa fa-plus" style="padding: 0 10px 0 0 ;"></i> Create Discussion</button>
            </form>
        </div>
        <div class="search" id="search">
            <div>
                <i class="fa fa-search"></i>
                <input type="Search" placeholder="search">
            </div>
        </div>
        <div class="dropDown">
            <button onmouseover="displayDropDown()" id="dropDownButton"><i class="fa fa-bars"></i></button>
        </div>
        <div class="profile">
            <h1><?php echo $_SESSION["myFullName"];?></h1>
            <?php echo $_SESSION["myProfile"] ?>
        </div>
        
    </header>
    <main id="hide">
        <aside class="left">
            <form action="blog.php">
                <button type="submit">See All Posts</button>
            </form>
        </aside>
        <section class="middle" id="middle">
        <?php
                $row_users = "";
                while($row_users = mysqli_fetch_array($resultPost)){
                    echo "<div class='post-box' name='postBox'>";
                    echo "<div class='profileContainer'>";
                    echo "<h1 class='profilePicturePost'>".$row_users['profilePicture']."</h1>";
                    echo "<h1 class='fullNamePost'>".$row_users['fullName']."</h1>";
                    echo "<br>";
                    echo '<div class="caption">'.$row_users['caption'].'</div>';
                    echo "</div>";
                    echo '<div class="imagePosted"><img src="uploads/'.$row_users['images'].'" class="post"></div>';
                    echo '<div class="postDateTime">Posted on: '.$row_users['postDateTime'].'</div>';
                    echo "<div><form action='delete_post.php'><button class='deletePost'>Delete This Post</button></form></div>";
                    echo "</div>";
                    $_SESSION['postId'] = $row_users['postId'];
                }
            ?>
        </section>
        <aside class="right">

        </aside>
    </main>
    
    
</body>
</html>
