<?php
include_once '../dbconnection.php';
session_start();

$teacherid = $_SESSION['teacherid'];
$previouspassword = $_POST['previouspassword'];
$newpassword = $_POST['newpassword'];

$query = "select * from teacher where teacherid='" . $teacherid . "' and password='" . $previouspassword . "';";
$result = $conn->query($query);


if ($result->num_rows > 0) {
    $query = "update teacher set password='" . $newpassword . "' where teacherid='" . $teacherid . "' and password='" . $previouspassword . "';";
    $result = $conn->query($query);
    echo "<script>
    alert('password changed.');
    window.location.href='changepassword.php';
    </script>";
} else {
    echo "<script>
    alert('previous password is incorrect!!!!');
    window.location.href='changepassword.php';
    </script>";
}
