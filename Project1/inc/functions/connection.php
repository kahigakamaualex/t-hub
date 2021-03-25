<?php

$db_host='localhost'; //Should contain the "Database Host" value
$db_name='Parttee'; //Should contain the "Database Name" value
$db_user='root'; //Should contain the "Database User" value
$db_pass=''; //Should contain the "Database Password" value

$conn = new MySQLi($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
die("Error: Failed to connect to database");
}
?>
