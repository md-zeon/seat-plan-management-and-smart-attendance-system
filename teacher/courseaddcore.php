<?php
include_once '../dbconnection.php';
session_start();


$courseid = $_POST['courseid'];
$coursename = $_POST['coursename'];

$query = "INSERT INTO `course`(`courseid`, `name`) VALUES ('".$courseid."','".$coursename."')";
$result = $conn->query($query);

echo $query;

if ($result) {
    header("Location: courselist.php");
} else {
    echo "<script>
    alert('something is wrong....');
    window.location.href='courseadd.php';
    </script>";
}

