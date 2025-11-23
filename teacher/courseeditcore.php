<?php
include_once '../dbconnection.php';
session_start();

$original_courseid = $_POST['original_courseid'];
$courseid = $_POST['courseid'];
$coursename = $_POST['coursename'];

// If course ID changed, check if the new course ID already exists
if ($original_courseid !== $courseid) {
    $checkQuery = "SELECT COUNT(*) as count FROM course WHERE courseid = '" . $courseid . "'";
    $checkResult = $conn->query($checkQuery);
    $checkRow = $checkResult->fetch_assoc();

    if ($checkRow['count'] > 0) {
        echo "<script>
        alert('Course ID already exists. Please choose a different Course ID.');
        window.location.href='courseedit.php?courseid=" . $original_courseid . "';
        </script>";
        exit();
    }
}

$query = "UPDATE course SET courseid='" . $courseid . "', name='" . $coursename . "' WHERE courseid='" . $original_courseid . "'";
$result = $conn->query($query);

if ($result) {
    echo "<script>
    alert('Course updated successfully!');
    window.location.href='courselist.php';
    </script>";
} else {
    echo "<script>
    alert('Something went wrong. Please try again.');
    window.location.href='courseedit.php?courseid=" . $original_courseid . "';
    </script>";
}
?>
