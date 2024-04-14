<?php

if (!isset($_POST['email']) || !isset($_POST['password'])) {
    die ("fill all fields!");
}

$connection = new mysqli("localhost", "root", "", "divesea");

if (!$connection) {
    die ("Server not responsing");
}

$result = $connection->query("SELECT * FROM users WHERE email = '".$_POST['email']."' AND password = '".$_POST['password']."'");

if (!$result || !$result->fetch_assoc()) {
    die ("Connection not detected");
} else {
    setcookie("isLogin", "true", time() + 12 * 60 * 60, '/');
    header("Location: http://divesea/index.php");
}