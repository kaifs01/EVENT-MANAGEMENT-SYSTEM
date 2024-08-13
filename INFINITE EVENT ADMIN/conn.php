<?php

$host = "localhost";
$username = "root";
$password = "";
$db_name = "event_e";
// Create connection
$cn = new mysqli($host, $username, $password, $db_name);
// Check connection
if ($cn->connect_error) {
	die ("Connection failed: " . $cn->connect_error);
} else {
	// echo"cn";
}
?>