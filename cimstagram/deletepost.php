<?php include("includes/database.php");
$sql = "DELETE FROM `posts` WHERE `id` = ".$_GET['post'];
$result = $mysqli->query($sql);
var_dump($result);//
?>