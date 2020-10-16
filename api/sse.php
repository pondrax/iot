<?php
include "conn.php";

header("Content-Type: text/event-stream");
header("Cache-Control: no-cache");

$query = "SELECT iddevice,id,spog,bpm,timestamp FROM dataset WHERE id > ? ORDER BY id DESC LIMIT 30";
$stmt = $conn->prepare($query);
$id = 0;
while (true) {
	
	$stmt->execute([$id]);
	if ($total = $stmt->rowCount()) {
		$rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		if($total<=0){break;}
		echo "id: " . $id . PHP_EOL;
		echo 'data: ' . json_encode(compact('total','rows')) . PHP_EOL . PHP_EOL;		
		$id = $rows[0]['id'];
	}
	
  ob_end_flush();
  flush();

  if ( connection_aborted() ) break;

  sleep(1);
}
