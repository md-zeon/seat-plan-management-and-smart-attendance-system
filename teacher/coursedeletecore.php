<?php
include_once '../dbconnection.php';
session_start();

$courseid = $_GET['courseid'];

// Check if course has any exams
$checkExamsQuery = "SELECT COUNT(*) as exam_count FROM exam WHERE course='" . $courseid . "'";
$examResult = $conn->query($checkExamsQuery);
$examCount = 0;
if ($examResult) {
    $examRow = $examResult->fetch_assoc();
    $examCount = $examRow['exam_count'];
}

if ($examCount > 0) {
    // Cannot delete course with existing exams
    echo "<script>
        alert('Cannot delete course: This course has associated exam records. Please remove exams first.');
        window.location.href='courselist.php';
        </script>";
} else {
    // Start transaction to ensure atomicity
    $conn->begin_transaction();

    try {
        // First delete all enrollments for this course
        $deleteEnrollQuery = "DELETE FROM enroll WHERE courseid='" . $courseid . "'";
        $conn->query($deleteEnrollQuery);

        // Then delete the course
        $deleteCourseQuery = "DELETE FROM course WHERE courseid='" . $courseid . "'";
        $result = $conn->query($deleteCourseQuery);

        // Commit the transaction
        $conn->commit();

        echo "<script>
            alert('Course deleted successfully!');
            window.location.href='courselist.php';
            </script>";
    } catch (Exception $e) {
        // Rollback on error
        $conn->rollback();
        echo "<script>
            alert('Error deleting course: " . addslashes($e->getMessage()) . "');
            window.location.href='courselist.php';
            </script>";
    }
}
?>
