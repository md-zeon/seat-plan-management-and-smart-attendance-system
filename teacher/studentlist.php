<?php
include("header.php");
?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Students</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Students</li>
                    </ul>
                </div>
                <div class="col-auto text-right float-right ml-auto">
                    <a href="studentAdd.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Enrolled Courses</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    $query = "select * from student;";
                                    $result = $conn->query($query);

                                    if ($result->num_rows > 0) {

                                        while ($row = $result->fetch_assoc()) {

                                            $studentid = $row['studentid'];
                                            $name = $row['name'];
                                            $email = $row['email'] ?? '';

                                            // Get enrolled courses
                                            $course_query = "SELECT GROUP_CONCAT(course.name SEPARATOR ', ') as courses FROM enroll JOIN course ON enroll.courseid = course.courseid WHERE enroll.studentid = '" . $studentid . "';";
                                            $course_result = $conn->query($course_query);
                                            $courses = '';
                                            if ($course_result->num_rows > 0) {
                                                $course_row = $course_result->fetch_assoc();
                                                $courses = $course_row['courses'];
                                            }
                                    ?>
                                            <tr>
                                                <td><?php echo $studentid  ?></td>
                                                <td><?php echo $name  ?></td>
                                                <td><?php echo $email  ?></td>
                                                <td><?php echo $courses ?: 'None'  ?></td>
                                                <td class="text-right">
                                                    <div class="actions">
                                                        <a href="studentedit.php?studentid=<?php echo $studentid ?>" class="btn btn-sm bg-primary-light">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="studentdeletecore.php?studentid=<?php echo $studentid ?>" class="btn btn-sm bg-danger-light">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <?php
    include("footer.php");
    ?>


<script>
        $("#students").addClass("active");
    </script>
