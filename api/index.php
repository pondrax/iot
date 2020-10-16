<?php
include "conn.php";

$requestMethod = $_SERVER['REQUEST_METHOD'];

if($requestMethod=='POST'){
	$idDevice=$_POST['iddevice'];
	$sql = "INSERT INTO dataset (iddevice, spog, bpm)
		VALUES ('$idDevice', '". rand()/10000000 ."', '". rand()/10000000 ."')";
	$conn->exec($sql);
}
