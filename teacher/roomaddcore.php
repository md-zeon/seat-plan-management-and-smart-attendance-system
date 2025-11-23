<?php
include_once '../dbconnection.php';
session_start();


$roomid = $_POST['roomid'];
$column = $_POST['column'];
$row = $_POST['row'];
$capacity = $column * $row;
$query = "INSERT INTO `room`(`roomid`,`columncount`, `capacity`) VALUES ('".$roomid."','".$column."','".$capacity."')";
$result = $conn->query($query);

echo $query;

if ($result) {
    header("Location: roomlist.php");
} else {
    echo "<script>
    alert('something is wrong....');
    window.location.href='roomadd.php';
    </script>";
}

