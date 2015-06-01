<?php
$db = new mysqli('localhost', 'root', 'password', 'odms');
if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}
?>
