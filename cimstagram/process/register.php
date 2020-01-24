<?php
//
// Store the variables from the POST request
$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];

if($firstName == "") {
  die("name must be specified!!!!!!");
}
include("../includes/db_class.php");
$db = new database();
// Our insert parameters
$tablename = "`users`";

$columndata = ['id' => "NULL",
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $email,
                'password' => $password,
                'created_date' => "CURRENT_TIMESTAMP"
                ];

$result = $db->insert($tablename,$columndata);

if ( $result ) {
 echo " we were able to create the record for ". $email;
 //here we can also do some additional logic.
 //for example, send them to the login page and display a message
    header("location: ../login.php?action=registrationcomplete");
} else {
  //var_dump($db->errors);
  echo "something went wrong ";
  //header("location: ../registration.php?action=registrationerror&error=".$result);
}
// close the connection once we are finished with our queries
?>
