<?php

$connection = new mysqli("localhost", "root", "", "divesea");

if (!$connection) {
    die ("Server not responsing");
}

$result = $connection->query("SELECT * FROM nft");

if (!$result) {
    die ("Connection not detected");
}

$res = [];

while ($row = $result->fetch_assoc()) {
    $res[] = $row;
}

echo json_encode($res);