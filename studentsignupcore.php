<?php
include_once 'dbconnection.php';
session_start();


$studentid = $_POST['studentid'];
$password = $_POST['password'];

$query = "select * from student where studentid='" . $studentid . "';";
$result = $conn->query($query);
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        if ($row['password'] == '') {
            $query = "update student set password='" . $password . "' where studentid='" . $studentid . "';";
            $result = $conn->query($query);
            $_SESSION['user'] = "student";
            $_SESSION['studentid'] = $row['studentid'];
            header("Location: student");
         
        } else {
            echo "<script>
        alert('This student already have an account');
        window.location.href='index.php';
         </script>";
        }
    }
} else {
    echo "<script>
    alert('Student Id not found');
    window.location.href='index.php';
    </script>";
}
