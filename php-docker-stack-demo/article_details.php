<?php
include('./conf.php');
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body style="background-color: #cfcfcf;">
    <?php
$sql = "SELECT article_table.id AS article_id, article_table.content, article_table.title, article_table.user_id, article_table.date, user_table.username
FROM article_table
JOIN user_table ON article_table.user_id = user_table.id";

if(isset($_GET['logout'])) {session_destroy();
    echo '<script>';
          echo 'window.location.href = "login.php";';
          echo '</script>';
    exit;}
if(isset($_GET['id'])) {
    $article_id = $_GET['id'];
    $where_condition = " WHERE article_table.id = $article_id";
    $sql .= $where_condition;

    $sql2 = "SELECT c.id AS comment_id, c.user_id, u.username, c.article_id, a.title AS article_title, c.comment
            FROM comments_table c
            INNER JOIN user_table u ON c.user_id = u.id
            INNER JOIN article_table a ON c.article_id = a.id WHERE a.id= $article_id;";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $article_id = $_GET['id'];
    $comment = isset($_POST['comment']) ? mysqli_real_escape_string($connect, $_POST['comment']) : null;
    
    if (!empty($article_id) && !empty($user_id) && !empty($comment)) {
        $add_query = "INSERT INTO `comments_table` (`user_id`, `article_id`, `comment`) VALUES ('$user_id', '$article_id', '$comment')";
        $add_result = mysqli_query($connect, $add_query);
        echo '<script>window.location.href = "article_details.php?id="'.$article_id.';</script>';
    } 
}
$article_result = mysqli_query($connect, $sql);
$comments_result = mysqli_query($connect, $sql2);
?>
    <?php include('./header.php'); ?>
    <?php
  $num = mysqli_num_rows($article_result);
  if ($num > 0) {
    while ($row = mysqli_fetch_assoc($article_result)) { ?>
    <div class="article-details-container">
        <div class="article-details">
            <h1 style="text-align: center;">
                <?php echo $row["title"]?>
            </h1>
            <p>
                <?php echo $row["content"]?>
            </p>
            <br>
            <h3 style="text-align: right; padding-right: 30px;">
                <?php echo $row["username"]?>
            </h3>
            <h6 style="text-align: right; padding-right: 30px;">
                <?php echo $row["date"]?>
            </h6>

        </div>
        <div class="comments-container">
            <h2 style="color:#3e9668">COMMENTS</h2>
            <hr style="width: 100%; border: 1px solid #3e9668;">

            <?php
            $num2 = mysqli_num_rows($comments_result);
            if ($num2 > 0) {
                while ($row2 = mysqli_fetch_assoc($comments_result)) { ?>
            <div class="comments">
                <h2>
                    <?php echo $row2["username"]?>
                </h2>
                <p>
                    <?php echo $row2["comment"]?>
                </p>
            </div>
            <?php } ?>
            <?php
    }
  }}
  ?>
            <div class="login-page">
                <div class="log-form">
                    <form class="login-form" action="#" method="post">
                        <input type="text" placeholder="username"
                            value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" readonly />
                        <textarea name="comment" placeholder="Enter your comment here..." rows="4" required></textarea>
                        <button style="background-color:#3e6878;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>