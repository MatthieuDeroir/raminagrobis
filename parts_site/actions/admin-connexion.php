<?php
session_start();

$_SESSION['newsession'] = $value;

$username = filter_input(INPUT_POST, "username");
$password = filter_input(INPUT_POST, "password");

$_SESSION['username'] = $username;
$_SESSION['password'] = $password;


if ($username == 'admin' && $password == 'admin') {
    $_SESSION['admin'] = true;
}
header("location: ../index.php");

