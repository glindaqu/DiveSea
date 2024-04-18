<?php

$conn = mysqli_connect("localhost", "root", "", "divesea");
$email = $_POST['email'];
$password = $_POST['password'];
$aka = $_POST['nickname'];
$bio = $_POST['bio'];
$query = "insert into users(email, password, bio, aka) values ('$email', '$password', '$bio', '$aka')";
$conn->query($query);

header("location: http://divesea/html/login.php");