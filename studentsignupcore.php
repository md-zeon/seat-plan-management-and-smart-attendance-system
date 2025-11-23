<?php
include_once 'dbconnection.php';
session_start();

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$query = "select * from student where email='" . $email . "';";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    echo "<script>
    alert('This email is already registered');
    window.location.href='index.php';
    </script>";
} else {
    // Get the next studentid
    $query = "select max(studentid) as maxid from student;";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $newid = $row['maxid'] + 1;

    $query = "insert into student (studentid, name, password, email) values (" . $newid . ", '" . $name . "', '" . $password . "', '" . $email . "');";
    $result = $conn->query($query);
    $_SESSION['user'] = "student";
    $_SESSION['studentid'] = $newid;
    echo "<script>
    alert('Account created successfully! Your student ID is: " . $newid . "');
    window.location.href='student';
    </script>";
}
