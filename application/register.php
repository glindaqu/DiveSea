<?php

if (!isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['password_again'])) {
    die('not enoght data');
}

$connection = mysqli_connect("localhost", 'root', '', 'divesea');

$connection->query("INSERT INTO users(email, password) VALUES (".$_POST['email'].', '.$_POST['password'].')');
header("location: http://divesea/public/html+php/login.html");