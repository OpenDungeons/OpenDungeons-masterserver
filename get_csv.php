<?php
include("conf.php");
header( 'Content-Type: text/plain; charset=utf-8' );
if ($games = $db->query("SELECT * FROM games WHERE (status=0 OR status=1) AND last_updated < (NOW() - INTERVAL 2 MINUTE)")){
while($row = $games->fetch_assoc()) {
    $uuid = $row['uuid'];
    $db->query("UPDATE games SET status=3 WHERE uuid='$uuid'");
}
} else {
    die("error: ".mysqli_error($db));
}
unset($row);

$result = $db->query("SELECT * FROM games WHERE status=0 OR status=1 ORDER BY announce_time DESC");
while($row = $result->fetch_assoc()){
  echo $row['id']."|".$row['uuid'].$row['ip_address']."|".$row['status']."|".$row['announce_time']."|".$row['last_updated'].PHP_EOL;
}

?>
