<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['teacherid']);
header("Location: ../index.php");

?>