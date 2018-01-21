<?php

$hostname = "129.2.24.163";
$username = "mschrodr";
$passwd = "mschrodr";
$dbname = "mschrodr";

try{
	$db_conn = new mysqli($hostname, $username, $passwd, $dbname);
}
catch (Exception $e){
	echo $e.getMessage();
}
?>