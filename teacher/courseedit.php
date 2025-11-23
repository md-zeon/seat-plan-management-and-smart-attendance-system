<?php
include("header.php");

$courseid = $_GET['courseid'];

// Get existing course data
$query = "SELECT * FROM course WHERE courseid = '" . $courseid . "'";
$result = $conn->query($query);
$row = $result->fetch_assoc();

$existing_courseid = $row['courseid'];
$existing_name = $row['name'];
?>


<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Edit Course</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="courselist.php">Course List</a></li>
                        <li class="breadcrumb-item active">Edit Course</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form method="post" action="courseeditcore.php">
                    <input type="hidden" name="original_courseid" value="<?php echo $existing_courseid; ?>">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="form-title"><span>Course Information</span></h5>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Course ID</label>
                                <input type="text" class="form-control" name="courseid" value="<?php echo $existing_courseid; ?>" required>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Course Name</label>
                                <input type="text" class="form-control" name="coursename" value="<?php echo $existing_name; ?>" required>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>

                </form>
            </div>
        </div>
    </div>
</div>


<?php
include("footer.php");
?>

<script>
    $("#courses").addClass("active");
</script>
