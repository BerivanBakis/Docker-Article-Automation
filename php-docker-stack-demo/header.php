<?php
if(isset($_GET['logout'])) {
    session_destroy();
    echo '<script>';
          echo 'window.location.href = "login.php";';
          echo '</script>';
    exit;
}
?>
 <div class="header">
        <div class="menu">
         <svg class="line-top" width="750" height="15" viewbox="0,0 1000,20">
          <line
           class="line-dash"
           x1="0"
           y1="15"
           x2="1000"
           y2="15"
           style="stroke: #4eb98200; stroke-width:2; stroke-linecap:round; stroke-dasharray: 180,1200; stroke-dashoffset: -35;"
          />
         </svg>
         <ul>
          <a href="index.php"><li>Home</li></a><a href="my_own_articles.php"><li>My Articles</li></a><a href="favorite_articles.php"><li>Favorite Articles</li></a><a href="?logout"><li>Logout</li></a>
         </ul>
         <svg class="line-bottom" width="750" height="30" viewbox="0,0 1000,40">
          <polygon class="lb" points="35,53 115,53 125,43 135,53 215,53" />
          <polygon class="lb" points="285,53 365,53 375,43 385,53 465,53" />
          <polygon class="lb" points="535,53 615,53 625,43 635,53 715,53" />
          <polygon class="lb" points="785,53 865,53 875,43 885,53 965,53" />
         </svg>
        </div>
       </div>
    <script src="script.js"></script>
