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
$status_check = true;
$table_name = 'article_table';
$sql = "SELECT article_table.*, user_table.username
FROM article_table
JOIN favorites_table ON article_table.id = favorites_table.article_id
JOIN user_table ON article_table.user_id = user_table.id
WHERE favorites_table.user_id = {$_SESSION['user_id']}";
$article_result = mysqli_query($connect, $sql);
$article_id = isset($_GET['id']) ? $_GET['id'] : null;
if ($status_check) {
    if (!empty($article_id)) {
      $article_id = mysqli_real_escape_string($connect, $_GET['id']);
      $delete_query = "DELETE FROM article_table WHERE id = $article_id";
      $result = mysqli_query($connect, $delete_query);
      echo '<script>window.location.href = "my_own_articles.php";</script>';
    }
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
                    <div class="wrap">
                        <a href="article_details.php?id=<?php echo $row["id"]?>"><button class="button">Read
                                More</button></a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
  }
  ?>
    </div>
    <div class="add_article" style="position: fixed; right: 50px; bottom: 50px;">
        <div class="wrap">
            <a href="add_article.php"><button class="button" style="width: 145px;">Add Article</button></a>
          </div>
       </div>
    <script src="script.js"></script>
</body>

</html>