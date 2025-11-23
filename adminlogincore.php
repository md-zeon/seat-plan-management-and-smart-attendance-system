<?php
include_once 'dbconnection.php';
session_start();

$adminid  = $_POST['adminid'];
$password = $_POST['password'];

$query = "select * from teacher where teacherid ='" . $adminid  . "' and password='" . $password . "';";
$result = $conn->query($query);
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $_SESSION['user'] = "admin";
        $_SESSION['adminid'] = $row['teacherid'];
        header("Location: teacher");
    }
} else {
    echo "<script>
    alert('email or password is incorrect');
    window.location.href='index.php';
    </script>";
}
