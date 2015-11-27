<?php
if(isset($_POST['uuid']) && isset($_POST['status'])) {

    include("conf.php");

    $status = $_POST['status'];
    $uuid = $_POST['uuid'];

    $stmt = $db->prepare("UPDATE games SET status=?, last_updated=NOW() WHERE uuid=?");
    if(!$stmt) {
        die("error: ".mysqli_error($db));
    }

    /* Bind parameters: s - string, b - blob, i - int, d - decimal */
    if (!$stmt ->bind_param("is", $status, $uuid)) {
        die("error: ".mysqli_error($db));
    }

    if (!$stmt->execute()) {
        die("error: ".mysqli_error($db));
    }
}
else {
    die("Missing parameters.");
}
