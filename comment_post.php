<?php
//start session
session_start();

//Adding to database
$servername = "localhost";
$username = "id19982279_root";
$password = "<^L1E]}\Iubao%hf";
$database = "id19982279_emit_db";

$connection = new mysqli($servername, $username, $password, $database);

$postId = $_SESSION['postIdComment'];
$sqlPosts = "SELECT * FROM response_post, posts WHERE response_post.postId = '$postId' AND posts.postId = '$postId' ORDER BY posts.postId DESC";
$resultPost = $connection->query($sqlPosts); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['myFullName'];?></title>
    <link rel="stylesheet" href="comment_post.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script>
       
    </script>     
</head>
<body>
    <header>
        <h1 class="logo">eMit</h1>
        <form action="post_comment_data.php" method="post">
        <div class="search">
                <div>
                    <i class="fas fa-comment"></i>
                    <input type="text" placeholder="Write a comment" name="comment" required>
                </div>
            </div>
            <div class="create">
                    <button>Submit</button>
            </div>
        </form>
        <div class="backContainer">
            <form action="post_preview.php"> 
                <button type="submit" class="back-arrow"><i class="fa fa-arrow-left"></i></button>
            </form>
        </div>
        <div class="profile">
            <h1><?php echo $_SESSION["myFullName"];?></h1>
            <?php echo $_SESSION["myProfile"] ?>
        </div>
    </header>
    <main>
        <aside class="left">
            <form action="post_preview.php"> 
                <button type="submit">See my Posts</button>
            </form>
        </aside>
        <section class="middle" id="middle">
        </section>
        <aside class="right">
                
        </aside>
    </main>
    
</body>
</html>

