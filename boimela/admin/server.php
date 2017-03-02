<?php

include_once "connection.php";


$table = $_REQUEST['t'];

$sql = "SELECT * FROM {$table} WHERE sync = 1";
$res = mysql_query($sql);

while ($row = mysql_fetch_assoc($res)) {
	$rows[] = $row;
}
/*
foreach ($rows as $row) {
	$sql = "UPDATE {$table} SET sync = 0 WHERE id = " . $row['id'];
	mysql_query($sql);
}
*/
echo serialize($rows);

include_once "client.php";
synchronize();
?>