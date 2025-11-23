<?php
include_once '../dbconnection.php';
session_start();

$examid = $_GET['examid'];

// Start transaction to ensure atomicity
$conn->begin_transaction();

try {
    // First delete all attendance records for this exam
    $deleteAttendanceQuery = "DELETE FROM attendance WHERE examid='" . $examid . "'";
    $conn->query($deleteAttendanceQuery);

    // Then delete the exam
    $deleteExamQuery = "DELETE FROM exam WHERE examid='" . $examid . "'";
    $result = $conn->query($deleteExamQuery);

    // Commit the transaction
    $conn->commit();

    echo "<script>
        alert('Exam deleted successfully!');
        window.location.href='examlist.php';
        </script>";
} catch (Exception $e) {
    // Rollback on error
    $conn->rollback();
    echo "<script>
        alert('Error deleting exam: " . addslashes($e->getMessage()) . ");
        window.location.href='examlist.php';
        </script>";
}
?>
