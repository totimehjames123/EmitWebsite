<?php
//start session
session_start();

//Adding to database
$servername = "localhost";
$username = "id19982279_root";
$password = "<^L1E]}\Iubao%hf";
$database = "id19982279_emit_db";

$connection = new mysqli($servername, $username, $password, $database);

$sqlPosts = "SELECT * FROM posts, signup WHERE posts.phoneNumber = signup.phoneNumber";
$resultPost = $connection->query($sqlPosts);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['myFullName'];?></title>
    <link rel="stylesheet" href="blog.css">
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

        // $("#form").submit(function (){
        //     $(this).find('input[type="submit"]').prop("disabled", true);
        // })
        
        

    </script>  
</head>
<body>
    
    <header>
        <h1 class="logo" onmouseover="showCommentBox()">eMit</h1>
        <form action="post_preview.php">
            <button type="submit" class="buttonSee">See my Posts</button>
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
            <form action="post_preview.php"> 
                <button type="submit">See my Posts</button>
            </form>
        </aside>
        <section class="middle" id="middle">
        <?php
                while($row_users = mysqli_fetch_array($resultPost)){

                    echo "<div class='post-box'>";

                    echo "<div class='profileContainer'>";

                    echo '<h1 class="profilePicturePost"><img src="uploads/'.$row_users['profilePicture'].'" class="profilepicture"></h1>';
                    echo "<h1 class='fullNamePost'>".$row_users['fullName']."</h1>";
                    echo "<br>";
                    echo '<div class="caption">'.$row_users['caption'].'</div>';
                    echo "</div>";
                    echo '<div class="imagePosted"><img src="uploads/'.$row_users['images'].'" class="post"></div>';
                    echo '<div class="response-container">';
                    echo '<div class="likeContainer" id="submitbtn"><form action="like_post.php" id="form"><button type="submit"><i class="fas fa-thumbs-up"></i></button></form>'.$row_users['like_post'].'</div>';
                    echo '<div class="unlikeContainer"><form action="unlike_post.php"><button type="submit"><i class="fas fa-thumbs-down"></i></button></form>'.$row_users['unlike_post'].'</div>';
                    
                    #Count comments
                    $postId = $row_users['postId'];
                    $sqlCountComment = "SELECT COUNT(comment) AS totalComment FROM response_post WHERE postId = $postId ";
                    $resultCommentCount = $connection->query($sqlCountComment);
                    $data = $resultCommentCount->fetch_assoc();


                    echo '<div class="commentContainer" id="commentButton">
                            <form action="comment_post.php" method="post"><button><i class="fas fa-comment"></i></button></form>'.$data['totalComment'].
                        '</div>';
                    echo '<div class="shareContainer">
                            <form action="#" method="post"><button><i class="fas fa-share"></i></button></form>
                        </div>';
                    echo "</div>";

                    echo '<div class="postDateTime">Posted on: '.$row_users['postDateTime'].'</div>'; 
                    echo "</div>";

                    $postId = $row_users['postId'];
                    $sql = "SELECT * FROM response_post WHERE postId = '$postId'";
                    $result = $connection->query($sql);
                    
                    $_SESSION['postIdComment'] = $row_users['postId'];
                    $_SESSION['fullNameComment'] = $row_users['fullName'];
                    $_SESSION['profilePictureComment'] = $row_users['profilePicture'];
                    echo "<div class='commentBoxContainer'>";
                    while($row = mysqli_fetch_array($result)){
                        
                        echo "<div class='commentBoxShow'>";
                        echo '<div class="profilePictureComment">'.$row["profilePictureComment"].'</div>';
                        echo "<div class='fullNameComment'>" . $row["fullNameComment"] ."</div>";
                        echo "<div class='comment'>".$row['comment']."</div>";
                        echo "<div class='commentDateTime' id='commentBoxShow'>Commented on: ".$row['commentDateTime']."</div>";
                        echo "</div>";
                        
                    }
                    echo "</div>"; 
                }
            ?>
        </section>
        <aside class="right">

        </aside>
    </main>
    
</body>
</html>
