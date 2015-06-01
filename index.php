<?php
include("conf.php");
// find unresponsive games
if ($games = $db->query("SELECT * FROM games WHERE (status=0 OR status=1) AND last_updated < (NOW() - INTERVAL 2 MINUTE)")){
while($row = $games->fetch_assoc()) {
    $uuid = $row['uuid'];
    $db->query("UPDATE games SET status=3 WHERE uuid='$uuid'");
}
} else {
    die("error: ".mysqli_error($db));
}
unset($row);
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8" />
    <title>OpenDungeons Masterserver</title>
    <style>
    body {
        font-family: monospace;
    }
    td,th{
        border:1px solid #eee;
        padding:4px;
    }
    th {
        background: #333;
        color: #fff;
    }
    table tr:nth-child(odd){
        background: #ccc;
    }
    </style>
</head>
<body>
    <h1>OpenDungeons Masterserver</h1>

    <h2>Available to join</h2>
    <table>
        <tr>
            <th>id</th>
            <th>uuid</th>
            <th>ip_address</th>
            <th>status</th>
            <th>announce_time</th>
            <th>last_updated</th>
        </tr>
    <?php
    $result = $db->query("SELECT * FROM games WHERE status=0 ORDER BY announce_time DESC");
    while($row = $result->fetch_assoc()){
    ?>
        <tr>
            <td><?=$row['id']?></td>
            <td><?=$row['uuid']?></td>
            <td><?=$row['ip_address']?></td>
            <td><?=$row['status']?></td>
            <td><?=$row['announce_time']?></td>
            <td><?=$row['last_updated']?></td>
        </tr>
    <?php
        }
    ?>
    </table>

    <h2>In progress</h2>
    <table>
        <tr>
            <th>id</th>
            <th>uuid</th>
            <th>ip_address</th>
            <th>status</th>
            <th>announce_time</th>
            <th>last_updated</th>
        </tr>
    <?php
    $result = $db->query("SELECT * FROM games WHERE status=1 ORDER BY last_updated");
    while($row = $result->fetch_assoc()){
    ?>
        <tr>
            <td><?=$row['id']?></td>
            <td><?=$row['uuid']?></td>
            <td><?=$row['ip_address']?></td>
            <td><?=$row['status']?></td>
            <td><?=$row['announce_time']?></td>
            <td><?=$row['last_updated']?></td>
        </tr>
    <?php
        }
    ?>
    </table>

    <h2>Finished</h2>
    <table>
        <tr>
            <th>id</th>
            <th>uuid</th>
            <th>ip_address</th>
            <th>status</th>
            <th>announce_time</th>
            <th>last_updated</th>
        </tr>
    <?php
    $result = $db->query("SELECT * FROM games WHERE status=2");
    while($row = $result->fetch_assoc()){
    ?>
        <tr>
            <td><?=$row['id']?></td>
            <td><?=$row['uuid']?></td>
            <td><?=$row['ip_address']?></td>
            <td><?=$row['status']?></td>
            <td><?=$row['announce_time']?></td>
            <td><?=$row['last_updated']?></td>
        </tr>
    <?php
        }
    ?>
    </table>

    <h2>Failed/Unresponsive</h2>
    <table>
        <tr>
            <th>id</th>
            <th>uuid</th>
            <th>ip_address</th>
            <th>status</th>
            <th>announce_time</th>
            <th>last_updated</th>
        </tr>
    <?php
    $result = $db->query("SELECT * FROM games WHERE status=3");
    while($row = $result->fetch_assoc()){
    ?>
        <tr>
            <td><?=$row['id']?></td>
            <td><?=$row['uuid']?></td>
            <td><?=$row['ip_address']?></td>
            <td><?=$row['status']?></td>
            <td><?=$row['announce_time']?></td>
            <td><?=$row['last_updated']?></td>
        </tr>
    <?php
        }
    ?>
    </table>

<p>Status 0 = Available, 1 = Game in progress, 2 = Game Over, 3 = Not responding</p>
</body>
