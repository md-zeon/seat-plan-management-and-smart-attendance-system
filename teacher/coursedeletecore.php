<?php
include_once '../dbconnection.php';
session_start();

$courseid = $_GET['courseid'];

$query = "delete from course where courseid='" . $courseid . "';";
echo $query;
$result = $conn->query($query);

echo "<script>
    alert('Deleted!!!!');
    window.location.href='courselist.php';
    </script>";
