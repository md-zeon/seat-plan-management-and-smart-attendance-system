<?php
include_once '../dbconnection.php';
session_start();

$examid = $_GET['examid'];

$query = "delete from exam where examid='" . $examid . "';";
echo $query;
$result = $conn->query($query);

echo "<script>
    alert('Deleted!!!!');
    window.location.href='examlist.php';
    </script>";
