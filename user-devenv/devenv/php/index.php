<?php

$user_name = "root";
$password = "changeme";
$database = "mysql";
$server = "db";

$db_handle = mysql_connect($server, $user_name, $password);
$db_found = mysql_select_db($database, $db_handle);

$SQL = "SELECT User, Password FROM user";
$result = mysql_query($SQL);

print '<h1>all users from mysql user table</h1>';
print '<ul>';

while ( $db_field = mysql_fetch_assoc($result) ) {

	print '<li>';
	print $db_field['User'] . ":";
	print $db_field['Password'];
	print '</li>';

}

print '</ul>';

mysql_close($db_handle);

