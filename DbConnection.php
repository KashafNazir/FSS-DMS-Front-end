<?php
$host = "localhost";
$user = "root";
$pass = "";
$name = "fssk2";
$db_connect = mysql_connect($host, $user, $pass) or die ("Could not connect to MySQL");
$db_select = mysql_select_db($name) or die ("Could not connect to database");
?>	
	