<?php
include_once '../dbconnection.php';
session_start();

$studentid = $_POST['studentid'];
$name = $_POST['name'];
$email = $_POST['email'];

$query = "update student set name='" . $name . "', email='" . $email . "' where studentid='" . $studentid . "';";
$result = $conn->query($query);

if ($result) {
    echo "<script>
    alert('Student updated successfully');
    window.location.href='studentlist.php';
    </script>";
} else {
    echo "<script>
    alert('Failed to update student');
    window.location.href='studentedit.php?studentid=" . $studentid . "';
    </script>";
}
