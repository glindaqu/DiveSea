<?php

$title = $_POST['title'];
$descr = $_POST['descr'];
$bid = $_POST['bid'];
$creatorId = $_COOKIE['login'];
$image = "nft".random_int(1, 3);

mysqli_connect("localhost", "root", "", "divesea")->query("insert into nft(title, descr, bid, creatorId, imagePath) 
values('$title', '$descr', $bid, $creatorId, '$image')");

header('location: http://divesea/');