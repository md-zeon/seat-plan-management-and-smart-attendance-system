<?php
include("header.php");

$studentid = $_GET['studentid'];

$query = "select * from student where studentid='" . $studentid . "';";
$result = $conn->query($query);
$row = $result->fetch_assoc();

$name = $row['name'];
$email = $row['email'];
?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Edit Student</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="studentlist.php">Students</a></li>
                        <li class="breadcrumb-item active">Edit Student</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="studenteditcore.php" method="post">
                            <input type="hidden" name="studentid" value="<?php echo $studentid; ?>">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Student</button>
                            <a href="studentlist.php" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("footer.php");
?>
