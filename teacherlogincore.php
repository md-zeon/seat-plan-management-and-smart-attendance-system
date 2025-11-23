<?php
include_once 'dbconnection.php';
session_start();

$teacherid  = $_POST['teacherid'];
$password = $_POST['password'];

$query = "select * from teacher where teacherid ='" . $teacherid  . "' and password='" . $password . "';";
$result = $conn->query($query);
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $_SESSION['user'] = "teacher";
        $_SESSION['teacherid'] = $row['teacherid'];
        header("Location: teacher");
    }
} else {
    echo "<script>
    alert('email or password is incorrect');
    window.location.href='index.php';
    </script>";
}
