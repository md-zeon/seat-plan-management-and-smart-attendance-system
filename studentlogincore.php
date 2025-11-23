<?php
include_once 'dbconnection.php';
session_start();

$login  = $_POST['email'];  // field still named email, but accepts ID or email
$password = $_POST['password'];

if (is_numeric($login)) {
    // Treat as student ID
    $query = "select * from student where studentid ='" . $login  . "' and password='" . $password . "';";
} else {
    // Treat as email
    $query = "select * from student where email ='" . $login  . "' and password='" . $password . "';";
}
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
