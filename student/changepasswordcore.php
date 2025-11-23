<?php
include_once '../dbconnection.php';
session_start();

$studentid = $_SESSION['studentid'];
$previouspassword = $_POST['previouspassword'];
$newpassword = $_POST['newpassword'];

$query = "select * from student where studentid='" . $studentid . "' and password='" . $previouspassword . "';";
$result = $conn->query($query);


if ($result->num_rows > 0) {
    $query = "update student set password='" . $newpassword . "' where studentid='" . $studentid . "' and password='" . $previouspassword . "';";
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
