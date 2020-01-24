<?php
//
// Store the variables from the POST request
$address = $_POST['address'];
$address_2 = $_POST['address_2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$user_id = 0;

include("../includes/db_class.php");

$db = new database();
//Since we need to associate this record with another, we need to get the record id first (user_id)
$columns = "*";
$tablename = "users";
$filters = ["email" => $_COOKIE['user']];
$result = $db->query($columns,$tablename,$filters);

while($user = $result->fetch_array(MYSQLI_ASSOC)) {
  echo $user['email']." ".$user['id']."<br>";
  $user_id = $user['id'];
}
// Our insert parameters




$columns = "user_id";
$tablename = "profile";
$filters = ["user_id" => $user_id];
$result = $db->query($columns,$tablename,$filters);

var_dump($result->num_rows);


$tablename = "profile";
$columndata = [ 'address' => $address,
                'address_2' => $address_2,
                'city' => $city,
                'state' => $state,
                'zip' => $zip,
                'user_id' => $user_id
                ];
if(isset($result->num_rows) && ($result->num_rows == 0)){
  echo "will do insert<br>";
$result = $db->insert($tablename,$columndata);
} else {
  //we update
  echo "will do update<br>";
  $result = $db->update($columndata,$tablename,$filters);

}

die();


//  $sql = "INSERT INTO `profile` (`id`, `address`, `address_2`, `city`, `state`, `zip`, `user_id`) VALUES (NULL, '$address', '$address_2', '$city', '$state', '$zip', '$user_id')";

$sql = "SELECT * FROM `users` WHERE `email` = '".$_COOKIE['user']."'";

$result = $mysqli->query($sql);
echo $result->num_rows.' found';
while($user = $result->fetch_array(MYSQLI_ASSOC)) {
  echo $user['email']." ".$user['id']."<br>";
  $user_id = $user['id'];
}

$sql = "SELECT * FROM `users` JOIN `profile` ON users.id = profile.user_id WHERE `email` = '". $_COOKIE['user'] ."'";

$result = $mysqli->query($sql);

echo $result->num_rows.' found';
if($result->num_rows) {
  //this is going to be an update
  $sql = "UPDATE `profile` SET `address` = '$address', `address_2` = '$address_2', `city` = '$city', `state` = '$state', `zip` = '$zip' WHERE `profile`.`id` = $user_id";
} else {
  //new record
  // First, we need a query...Paste the query we copied from phpmyadmin and replace the values with our variables
  $sql = "INSERT INTO `profile` (`id`, `address`, `address_2`, `city`, `state`, `zip`, `user_id`) VALUES (NULL, '$address', '$address_2', '$city', '$state', '$zip', '$user_id')";
}


// Print the sql to debug
print($sql);
//die();
// https://www.php.net/manual/en/mysqli.query.php
/* Select queries return a result. On insert, returns 1 or 0 (TRUE or FALSE)  */

if ( $result = $mysqli->query($sql) ) {
 echo " we were able to create the profile for ". $_COOKIE['user'];
 header("location: ../profile.php?update=true");
} else {
  echo "something went wrong ";
  echo $mysqli->error;
}
// close the connection once we are finished with our queries
$mysqli->close();
?>
