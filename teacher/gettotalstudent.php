<?php
include_once '../dbconnection.php';
session_start();

$course = $_POST['course'];


$query = "select * from enroll where courseid='" . $course . "';";
$result = $conn->query($query);


echo $result->num_rows;
