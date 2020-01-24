<?php
//
// Store the variables from the POST request
$email = $_POST['email'];
$password = $_POST['password'];
include("../includes/db_class.php");

//initialize the class
$db = new database();
$columns = "*";
$tablename = "users";
$filters = ["email" => $email, "password" => $password];
$result = $db->query($columns,$tablename,$filters);

if($result->num_rows == 1) {
    setcookie("user", $email, time()+3600, '/');
    header("location: ../users.php");
  } else {
    echo "user not found. check your password and try again.!!!!!";
  }
?>
