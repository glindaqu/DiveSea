<?php


if (!isset($_COOKIE['login']) || !isset($_GET['item']) || !isset($_GET['cost'])) {
    if (!isset($_COOKIE['login'])) {
        header("location: http://divesea/html/login.php");
    } else {
        die("item not set");
    }
}

$conn = mysqli_connect("localhost", "root", "", "divesea");
$user = $conn->query("SELECT * from users where id = " . $_COOKIE['login'])->fetch_assoc();
if ($user['money'] < $_GET['cost']) {
    die('not enough money!');
}
$query = "INSERT INTO collection(holderId, nftId, title) VALUES (" . $_COOKIE['login'] . ", " . $_GET['item'] . ", '" . $user['email'] . "')";
$conn->query($query);
$query = "UPDATE users set money = ". $user['money'] - $_GET['cost']." WHERE id = ".$_COOKIE['login'];
$conn->query($query);
// echo $query;
header("location: http://divesea/html/profile.php");
