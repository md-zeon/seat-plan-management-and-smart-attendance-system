<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['studentid']);
header("Location: ../index.php");

?>