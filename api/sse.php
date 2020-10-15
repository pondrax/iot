<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "iot";

header("Content-Type: text/event-stream");
header("Cache-Control: no-cache");

$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "SELECT iddevice, spog, bpm,timestamp FROM dataset WHERE timestamp > ? ORDER BY id DESC LIMIT 1";
$stmt = $conn->prepare($query);
$ts = time();

while(true) 
{
	// var_dump)
    if ($stmt->execute([$ts])) {
        $row = $stmt->fetch();
        // var_dump($row);
        echo "data: " . json_encode($row) . "\n\n";
        // die();
        // $ts = $row['timestamp'];
        flush();
    }
    // sleep(0.2);
}
?>
