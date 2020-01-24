
<?php include("secure.php");?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <?php include("includes/head.php"); ?>
  </head>
  <body>
    <?php include("includes/navbar.php"); ?>
    <div class="container">
      <h1>This is a sample page where users get redirected after successful authentication. </h1>

<?php
include("includes/database.php");
// A query to get all records from the `users` table
$sql = "SELECT * FROM `users` WHERE false = false";

$result = $mysqli->query($sql);
echo $result->num_rows.' users found<br>';
while($user = $result->fetch_array(MYSQLI_ASSOC)) {
  echo $user['first_name']." ".$user['last_name']."<br>";
}
?>
<h1>Current user</h1>

<?php
// A query to get all records from the `users` table and join it to the `profile` table
$sql = "SELECT * FROM `users` JOIN `profile` ON users.id = profile.user_id WHERE `email` = '". $_COOKIE['user'] ."'";

$result = $mysqli->query($sql);

//if we have 1 user
if($result->num_rows) {
  ?>
  <a href="profile.php">Edit Profile</a>
  <?php
  }
  else {
    ?>
    <p>It seems you don't have a profile ...<a href="profile.php">Create Profile</a></p>
    <?php
  }

while($user = $result->fetch_array(MYSQLI_ASSOC)) {
  echo "<br>Name: ".$user['first_name']." ".$user['last_name']."<br>User ID: ".$user['id'];
}
?>
<br>
<a href="logout.php">Log out</a>
</div>
<?php include("includes/scripts.php"); ?>

</body>
</html>