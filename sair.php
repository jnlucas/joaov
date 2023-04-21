<?php
session_start();
$_SESSION['usuario'] = null;
unset($_SESSION['usuario']);
header('location:index.php');
?>