<?php
// Initialize the PHP MySql library
$mysqli = mysqli_init();
// Error checking syntax
if (!$mysqli) {
    die('mysqli_init failed');
}
// More error checking.
if (!$mysqli->options(MYSQLI_INIT_COMMAND, 'SET AUTOCOMMIT = 1')) {
    die('Setting MYSQLI_INIT_COMMAND failed');
}
// If it takes more than 5 seconds to connect, we have a problem
if (!$mysqli->options(MYSQLI_OPT_CONNECT_TIMEOUT, 5)) {
    die('Setting MYSQLI_OPT_CONNECT_TIMEOUT failed');
}
// connect syntax $mysqli->real_connect('host address', 'username', 'password', 'database name');
// In the following connection, the password is empty because of the default xampp installation
if (!$mysqli->real_connect('localhost', 'root', '', 'cimstagram')) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}

//echo 'Success... ' . $mysqli->host_info . "\n<br>";

?>