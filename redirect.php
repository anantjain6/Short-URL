<?php

include 'config.php';
include 'db-connect.php';
include 'function.php';

$result = urlfromid($_GET['id']);
$result = json_decode($result, true);
if ($result['status'] == "success")
{
	$longlink = $result['longlink'];
	header("HTTP/1.1 301 Moved Permanently");
	header("Location: " . $longlink);
	exit();
}
else
{
	echo '<center><h1>URL not found</h1></center>';
}

?>