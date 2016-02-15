<?php
include("conf.php");
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
            <th>uuid</th>
            <th>od_version</th>
            <th>creator</th>
            <th>ip_address</th>
            <th>status</th>
            <th>last_updated</th>
        </tr>
    <?php
    $result = $db->query("SELECT * FROM games WHERE status=0 AND last_updated > (UTC_TIMESTAMP() - INTERVAL 1 MINUTE) ORDER BY creator ASC");
    while($row = $result->fetch_assoc()){
    ?>
        <tr>
            <td><?=$row['uuid']?></td>
            <td><?=$row['od_version']?></td>
            <td><?=$row['creator']?></td>
            <td><?=$row['ip_address']?></td>
            <td><?=$row['status']?></td>
            <td><?=$row['last_updated']?></td>
        </tr>
    <?php
        }
    ?>
    </table>

    <h2>In progress</h2>
    <table>
        <tr>
            <th>uuid</th>
            <th>od_version</th>
            <th>creator</th>
            <th>ip_address</th>
            <th>status</th>
            <th>last_updated</th>
        </tr>
    <?php
    $result = $db->query("SELECT * FROM games WHERE status=1 ORDER BY last_updated");
    while($row = $result->fetch_assoc()){
    ?>
        <tr>
            <td><?=$row['uuid']?></td>
            <td><?=$row['od_version']?></td>
            <td><?=$row['creator']?></td>
            <td><?=$row['ip_address']?></td>
            <td><?=$row['status']?></td>
            <td><?=$row['last_updated']?></td>
        </tr>
    <?php
        }
    ?>
    </table>

    <h2>Finished</h2>
    <table>
        <tr>
            <th>uuid</th>
            <th>od_version</th>
            <th>creator</th>
            <th>ip_address</th>
            <th>status</th>
            <th>last_updated</th>
        </tr>
    <?php
    $result = $db->query("SELECT * FROM games WHERE status=2 ORDER BY last_updated");
    while($row = $result->fetch_assoc()){
    ?>
        <tr>
            <td><?=$row['uuid']?></td>
            <td><?=$row['od_version']?></td>
            <td><?=$row['creator']?></td>
            <td><?=$row['ip_address']?></td>
            <td><?=$row['status']?></td>
            <td><?=$row['last_updated']?></td>
        </tr>
    <?php
        }
    ?>
    </table>

    <h2>Timeout</h2>
    <table>
        <tr>
            <th>uuid</th>
            <th>od_version</th>
            <th>creator</th>
            <th>ip_address</th>
            <th>status</th>
            <th>last_updated</th>
        </tr>
    <?php
    $result = $db->query("SELECT * FROM games WHERE status=0 AND last_updated < (UTC_TIMESTAMP() - INTERVAL 1 MINUTE) ORDER BY last_updated");
    while($row = $result->fetch_assoc()){
    ?>
        <tr>
            <td><?=$row['uuid']?></td>
            <td><?=$row['od_version']?></td>
            <td><?=$row['creator']?></td>
            <td><?=$row['ip_address']?></td>
            <td><?=$row['status']?></td>
            <td><?=$row['last_updated']?></td>
        </tr>
    <?php
        }
    ?>
    </table>
<p>Status 0 = Available, 1 = Game in progress, 2 = Game Over</p>
</body>
