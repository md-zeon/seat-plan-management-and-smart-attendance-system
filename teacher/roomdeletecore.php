<?php
include_once '../dbconnection.php';
session_start();

$roomid = $_GET['roomid'];

$query = "delete from room where roomid='" . $roomid . "';";
echo $query;
$result = $conn->query($query);

echo "<script>
    alert('Deleted!!!!');
    window.location.href='roomlist.php';
    </script>";
