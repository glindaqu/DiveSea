<?php

$connection = new mysqli("localhost", "root", "", "divesea");

if (!$connection) {
    die ("Server not responsing");
}

$result = $connection->query("
    select 
    collection.imagePath as image, 
    collection.title as title, 
    users.email as holder,
    sum(nft.bid) as volume,
    100 as percent,
    min(nft.bid) as floor,
    count(*) as items
    from nft
    join collection 
    on nft.collectionId = collection.id
    join users
    on collection.holderId = users.id
    group by collectionId;
");

if (!$result) {
    die ("Connection not detected");
}

$res = [];

while ($row = $result->fetch_assoc()) {
    $res[] = $row;
}

echo json_encode($res);