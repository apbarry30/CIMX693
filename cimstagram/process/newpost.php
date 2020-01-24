<?php
//
// Store the variables from the POST request
$image = $_POST['image'];
$caption = $_POST['caption'];
$user_id = 0;

include("../includes/database.php");

$sql = "SELECT * FROM `users` WHERE `email` = '".$_COOKIE['user']."'";
//perform the query
$result = $mysqli->query($sql);
echo $result->num_rows.' found';

while($user = $result->fetch_array(MYSQLI_ASSOC)) {
  echo $user['email']." ".$user['id']."<br>";
  //assign the value to our variable
  $user_id = $user['id'];
}


$sql = "INSERT INTO `posts` (`id`, `image`, `caption`, `user_id`, `created_date`) VALUES (NULL, '$image', '$caption', '$user_id', CURRENT_TIMESTAMP)";


// Print the sql to debug
print($sql);
//die();
// https://www.php.net/manual/en/mysqli.query.php
/* Select queries return a result. On insert, returns 1 or 0 (TRUE or FALSE)  */

if ( $result = $mysqli->query($sql) ) {
 echo " we were able to create the post for ". $_COOKIE['user'];
 // redirect users automatically with
 header("location: ../feed.php");
} else {
  echo "something went wrong ";
  echo $mysqli->error;
}
// close the connection once we are finished with our queries
$mysqli->close();
?>
