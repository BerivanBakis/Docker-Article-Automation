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
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
    crossorigin="atitlenymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $article_id = isset($_POST['id']) ? mysqli_real_escape_string($connect, $_POST['id']) : null;
    $content = isset($_POST['content']) ? mysqli_real_escape_string($connect, $_POST['content']) : null;
    $title = isset($_POST['title']) ? mysqli_real_escape_string($connect, $_POST['title']) : null;

    if (!empty($article_id) && !empty($title) && !empty($content)) {
        $update_query = "UPDATE article_table SET content = '$content', title = '$title' WHERE id = $article_id";
        $update_result = mysqli_query($connect, $update_query);
        if ($update_result) {
          echo '<script>';
          echo 'window.location.href = "my_own_articles.php";';
          echo '</script>';
        } else {
          echo 'window.location.href = "my_own_articles.php";';
        }
    } 
}
?>
<?php include('./header.php'); ?>
<?php
    $article_id = isset($_GET['id']) ? $_GET['id'] : null;
    if (!empty($article_id)) {
        $article_id = mysqli_real_escape_string($connect, $_GET['id']);
        $new_query = "SELECT * FROM article_table WHERE id = $article_id";
        $new_result = mysqli_query($connect, $new_query);
        if ($new_result) {
            while ($row = mysqli_fetch_assoc($new_result)) { ?>
            
                <div class="add-article-container">  
        <form id="contact" action="#" method="post">
        <input type="hidden" name="id" value="<?php echo $article_id; ?>">
          <h3>Adding an Article</h3>
          <fieldset>
          <input placeholder="Your name" name="writer" type="text" tabindex="1" required autofocus readonly value="<?php echo $_SESSION['username'];?>">
          </fieldset>
          <fieldset>
          <input placeholder="Article Title" name="title" type="text" tabindex="1" required  value="<?php echo $row['title'];?>">
          </fieldset>
          <fieldset>
          <textarea placeholder="Type your article here...." name="content" tabindex="5" required><?php echo $row['content'];?></textarea>
          </fieldset>
          <fieldset>
            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Update</button>
          </fieldset>
        </form>
      </div>
            <?php
            }
        }
    }
    ?>

    <script src="script.js"></script>
</body>
</html>