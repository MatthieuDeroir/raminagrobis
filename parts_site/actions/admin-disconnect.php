<?php session_start();
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['admin']);
header("location: ../index.php");
?>



