<?php
//This is a secure page. You should see it only if you are logged in
//check if a user is logged in
if(isset($_COOKIE['user']) && ($_COOKIE['user'] != '')) {
  //This means we are logged in!
} else{
  echo "<p>You need to log in</p>";
  header("location: /app/login/login.php");
}
?>