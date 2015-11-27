<?php
include("conf.php");
header( 'Content-Type: text/plain; charset=utf-8' );

$result = $db->query("SELECT * FROM games WHERE status=0 AND last_updated > (NOW() - INTERVAL 1 MINUTE) ORDER BY creator ASC");
while($row = $result->fetch_assoc()){
  echo $row['od_version'].";".$row['uuid'].";".$row['creator'].";".$row['ip_address'].";".$row['port'].";".$row['label'].";".$row['descr'].PHP_EOL;
}

?>
