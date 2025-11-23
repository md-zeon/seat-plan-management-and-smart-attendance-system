<?php
include_once '../dbconnection.php';
session_start();


$studentid = $_POST['studentid'];
$studentname = $_POST['studentname'];

$query = "INSERT INTO `student`(`studentid`, `name`, `password`) VALUES ('".$studentid."','".$studentname."','')";
$result = $conn->query($query);

if ($result) {
    header("Location: studentlist.php");
} else {
    echo "<script>
    alert('something is wrong....');
    window.location.href='studentadd.php';
    </script>";
}
