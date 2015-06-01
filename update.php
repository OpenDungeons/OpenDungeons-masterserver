<?php
if(isset($_GET['uuid']) && isset($_GET['status'])) {

    include("conf.php");

    $uuid = $db->real_escape_string($_GET['uuid']);
    $status = $db->real_escape_string($_GET['status']);
    $status = intval($status);


    if($db->query("UPDATE games SET status=$status, last_updated=NOW() WHERE uuid='$uuid'")) {
        print_r("ok");
    } else {
        die("error");
    }

}
else {
    die("No UUID/Status provided.");
}
