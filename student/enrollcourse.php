<?php
include_once '../dbconnection.php';
session_start();

$courseid = $_GET['courseid'];
$studentid = $_SESSION['studentid'];

$query = "INSERT INTO `enroll`(`courseid`, `studentid`) VALUES ('".$courseid."','".$studentid."')";
$result = $conn->query($query);

echo "<script>
    alert('Enrolled!!!!');
    window.location.href='courselist.php';
    </script>";
