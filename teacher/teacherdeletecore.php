<?php
include_once '../dbconnection.php';
session_start();

$teacherid = $_GET['teacherid'];

$query = "delete from teacher where teacherid='" . $teacherid . "';";
$result = $conn->query($query);

echo "<script>
    alert('Deleted!!!!');
    window.location.href='teacherlist.php';
    </script>";
    