<?php
if(isset($_POST['odVersion']) && isset($_POST['creator']) && isset($_POST['port']) && isset($_POST['label']) && isset($_POST['descr'])) {
    include("conf.php");
    include("str.php");
    $result = $db->query("SELECT CONCAT(DATE_FORMAT(UTC_TIMESTAMP(),'%Y%m%d%H%i%S'), REPLACE(UUID(),'-',''))");
    if (!$result) {
        die("error: ".mysqli_error($db));
    }
    $row = $result->fetch_row();
    if (!$row) {
        die("error: ".mysqli_error($db));
    }

    $uuid = $row[0];
    $odVersion = $_POST['odVersion'];
    $creator = $_POST['creator'];
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    $port = $_POST['port'];
    $label = $_POST['label'];
    $descr = $_POST['descr'];

    $stmt = $db->prepare("INSERT INTO games (uuid,od_version,creator,ip_address,port,label,descr,last_updated) VALUES (?,?,?,?,?,?,?,UTC_TIMESTAMP())");
    if(!$stmt) {
        die("error: ".mysqli_error($db));
    }

    /* Bind parameters: s - string, b - blob, i - int, d - decimal */
    if (!$stmt ->bind_param("ssssiss", $uuid, $odVersion, $creator, $ip_address, $port, $label, $descr)) {
        die("error: ".mysqli_error($db));
    }

    if (!$stmt->execute()) {
        die("error: ".mysqli_error($db));
    }

    echo "uuid=" . $uuid;
}
else {
    die("Missing parameters.");
}

?>
