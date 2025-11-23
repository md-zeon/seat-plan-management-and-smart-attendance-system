<?php
include("header.php");
$studentid = $_SESSION['studentid'];
?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Courses</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Course List</li>
                    </ul>
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
                                        <th>Course ID</th>
                                        <th>Course Name</th>
                                        <th class="text-right">Enroll</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    $query = "select * from course;";
                                    $result = $conn->query($query);

                                    if ($result->num_rows > 0) {

                                        while ($row = $result->fetch_assoc()) {

                                            $courseid  = $row['courseid'];
                                            $name = $row['name'];
                                    ?>
                                            <tr>
                                                <td><?php echo $courseid   ?></td>
                                                <td><?php echo $name  ?></td>
                                                <td class="text-right">
                                                    <div class="actions">
                                                        <?php
                                                        $query1 = "select * from enroll where courseid='" . $courseid . "' and studentid='" . $studentid . "';";
                                                        $result1 = $conn->query($query1);

                                                        if ($result1->num_rows == 0) { ?>

                                                            <a href="enrollcourse.php?courseid=<?php echo $courseid  ?>" class="btn btn-sm bg-primary-light">
                                                                <i class="fa fa-address-book"></i>
                                                            </a>
                                                        <?php } else {
                                                            echo 'Enrolled';
                                                        } ?>

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
        $("#courses").addClass("active");
    </script>