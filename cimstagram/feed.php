<?php include("secure.php"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Feed</title>
    <?php include("includes/head.php"); ?>
  </head>
  <body>
    <?php include("includes/navbar.php"); ?>
    <div class="container">
      <?php include("includes/database.php"); ?>
      <?php
      $sql = "SELECT * FROM `users` JOIN `posts` ON users.id = posts.user_id WHERE `email` = '". $_COOKIE['user'] ."'";

      // We use echo $sql for testing purposes only
      //echo $sql;
      $result = $mysqli->query($sql);
      //Show a message if there are no posts
      if($result->num_rows == 0) {
        echo "<h1>No posts yet!!</h1>";
      }
      while($post = $result->fetch_array(MYSQLI_ASSOC)) {
        ?>
        <div class="card" style="width:50%">
          <img class="card-img-top" src="https://placehold.it/640x480?text=<?php echo $post['image'];?>" alt="Card image cap">
          <!-- <img class="card-img-top" src="<?php echo $post['image'];?>" alt="Card image cap"> -->
          <div class="card-body">
            <h5 class="card-title">Posted on: <?php echo $post['created_date']?></h5>
            <p class="card-text"><?php echo $post['caption']?></p>
            <a href="deletepost.php?post=<?php echo $post['id'];?>" class="btn btn-primary">Delete</a>
          </div>
        </div>
        <?php } ?>
    </div>
    <?php include("includes/scripts.php"); ?>
  </body>
</html>
