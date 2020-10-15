<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "iot";

try {
	$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	// set the PDO error mode to exception
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// echo "Connected successfully";
	$requestMethod = $_SERVER['REQUEST_METHOD'];
	
	if($requestMethod=='GET'){
		$lastTime = $_GET['lastTime'] ?? null;
		$WHERE="";
		if($lastTime){
			$WHERE = "WHERE timestamp>$lastTime";
		}
		$sql = "SELECT iddevice, spog, bpm,timestamp FROM dataset $WHERE ORDER BY id desc LIMIT 1000 ";
		$result = $conn->query($sql);
		
		$rows = $result->fetchAll();
		echo json_encode(compact('lastTime','rows'));
		
	}else if($requestMethod=='POST'){
		$idDevice=$_POST['iddevice'];
		$sql = "INSERT INTO dataset (iddevice, spog, bpm)
		  VALUES ('$idDevice', '". rand()/10000000 ."', '". rand()/10000000 ."')";
		$conn->exec($sql);
	}
  
  
} catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}



?>