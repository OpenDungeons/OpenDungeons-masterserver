<?php
if(isset($_GET['uuid']) && isset($_GET['ip'])  ){

    include("conf.php");
    $uuid = $db->real_escape_string($_GET['uuid']);
    $ip_address = $db->real_escape_string($_GET['ip']);
    $uuid = strtolower($uuid);
    if(strlen($uuid) == 36){
        if($db->query("INSERT INTO games (uuid,ip_address,announce_time) VALUES ('$uuid','$ip_address', NOW() )")) {
            print_r("ok");
        } else {
            die("error: ".mysqli_error($db));
        }
    } else {
        die("error: this is not an UUID.");
    }

} else {
    die("error: no UUID/IP provided.");
}
?>
