<?php
session_start();

unset($_SESSION['name']);
unset($_SESSION['role']);
unset($_SESSION['user_id']);

header("Location: login.php"); 
exit();
?>