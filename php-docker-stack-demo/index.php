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


<body>
    <?php
$table_name = 'article_table';
$sql = "SELECT article_table.*, user_table.username
FROM article_table
JOIN user_table ON article_table.user_id = user_table.id";
$article_result = mysqli_query($connect, $sql);

if (isset($_GET['add_favorite'])) {
    $userId = $_SESSION['user_id'];
    $articleId = $_GET['add_favorite'];
    $check_favorite_query = "SELECT * FROM favorites_table WHERE user_id = '$userId' AND article_id = '$articleId'";
    $check_favorite_result = mysqli_query($connect, $check_favorite_query);
    if (mysqli_num_rows($check_favorite_result) == 0) {
        $add_favorite_query = "INSERT INTO favorites_table (user_id, article_id) VALUES ('$userId', '$articleId')";
        $add_favorite_result = mysqli_query($connect, $add_favorite_query);
        if ($add_favorite_result) {
            echo '<script>alert("Article successfully added to favorites!");</script>';
        } else {
            echo '<script>alert("An error occurred while adding the article to favorites!");</script>';
        }
    } else {
        echo '<script>alert("This article is already added to favorites!");</script>';
    }
    echo '<script>window.location.href = "index.php";</script>';
}

?>
<?php include('./header.php'); ?>
<div class="article-container">
<?php
  $num = mysqli_num_rows($article_result);
  if ($num > 0) {
    while ($row = mysqli_fetch_assoc($article_result)) { ?>
        <div class="card">
            <div class="face face1">
                <div class="content">
                    <div class="icon">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        <h1>
                            <?php echo $row["title"]?>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="face face2">
                <div class="content">
                    <h3>
                        <?php echo $row["title"]?>
                    </h3>
                    <p><strong>Writer:</strong>
                        <?php echo $row["username"]?>
                    </p>
<div style="display: flex; flex-direction: row; justify-content: center;">
                        <div class="wrap">
                        <a href='article_details.php?id=<?php echo $row["id"]?>'><button class="button">Read More</button></a>
                            
                          </div>
                          <div class="wrap">
                          <a href='index.php?add_favorite=<?php echo $row["id"]?>'><button class="button update">Add Favorite</button></a>
                          </div>
                      </div>
                </div>
            </div>
        </div>
        <?php
    }
  }
  ?>
    </div>
    <script src="script.js"></script>
</body>

</html>