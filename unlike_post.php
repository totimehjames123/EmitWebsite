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
$sql = "UPDATE posts SET unlike_post = unlike_post + 1 WHERE postId = $postId";

$result = $connection->query($sql);


?>
<?php
    ?>
    <script type='text/javascript'>
        $(document).ready(function(){
            $(document).getElementById("submitbtn").style.display = "none";
        });
    </script>
    <?php
?>