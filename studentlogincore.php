<?php
include_once 'dbconnection.php';
session_start();

$studentid  = $_POST['studentid'];
$password = $_POST['password'];

$query = "select * from student where studentid ='" . $studentid  . "' and password='" . $password . "';";
$result = $conn->query($query);
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        $_SESSION['user'] = "student";
        $_SESSION['studentid'] = $row['studentid'];
        header("Location: student");
    }
} else {
    echo "<script>
    alert('email or password is incorrect');
    window.location.href='index.php';
    </script>";
}
