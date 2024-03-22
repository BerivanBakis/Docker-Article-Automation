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
    crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $article_id = isset($_POST['id']) ? mysqli_real_escape_string($connect, $_POST['id']) : null;
    $content = isset($_POST['content']) ? mysqli_real_escape_string($connect, $_POST['content']) : null;
    $title = isset($_POST['title']) ? mysqli_real_escape_string($connect, $_POST['title']) : null;
    $writer = isset($_SESSION['user_id']) ? mysqli_real_escape_string($connect, $_SESSION['user_id']) : null;

    if (!empty($article_id) && !empty($title) && !empty($content)) {
        $add_query = "INSERT INTO `article_table` (`user_id`, `title`, `content`) VALUES ('$writer', '$title', '$content')";
        $add_result = mysqli_query($connect, $add_query);
        echo '<script>window.location.href = "my_own_articles.php";</script>';
    } 
}
?>
<?php include('./header.php'); ?>
       <div class="add-article-container">  
       <form id="contact" action="#" method="post">
        <input type="hidden" name="id" value="<?php echo $article_id; ?>">
          <h3>Adding an Article</h3>
          <fieldset>
          <input placeholder="Your name" name="writer" type="text" tabindex="1" required value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>" readonly>
          </fieldset>
          <fieldset>
          <input placeholder="Article Title" name="title" type="text" tabindex="1" required >
          </fieldset>
          <fieldset>
          <textarea placeholder="Type your article here...." name="content" tabindex="5" required></textarea>
          </fieldset>
          <fieldset>
            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Add</button>
          </fieldset>
        </form>
      </div>
    <script src="script.js"></script>
</body>
</html>