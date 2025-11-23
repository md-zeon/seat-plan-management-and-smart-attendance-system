<?php

include("header.php");
?>




<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Exams</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Exam List</li>
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
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Course</th>
                                        <th class="text-right">View</th>
                                        <th class="text-right">Attendence</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    $query = "select * from exam order by examid desc;";
                                    $result = $conn->query($query);

                                    if ($result->num_rows > 0) {

                                        while ($row = $result->fetch_assoc()) {

                                            $examid  = $row['examid'];
                                            $date = $row['date'];
                                            $time = $row['time'];
                                            $course  = $row['course'];


                                    ?>
                                            <tr>
                                                <td><?php echo $examid  ?></td>
                                                <td><?php echo $date  ?></td>
                                                <td><?php echo $time  ?></td>
                                                <td><?php echo $course  ?></td>



                                                <td class="text-right">
                                                    <div class="actions">
                                                        <a href="viewroom.php?examid=<?php echo $examid ?>" class="btn btn-sm bg-primary">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </td>


                                                <td class="text-right">
                                                    <div class="actions">
                                                       
                                                        <a href="attendence.php?examid=<?php echo $examid ?>" class="btn btn-sm bg-danger-light">
                                                            <i title="Take attendance" class="fas fa-chalkboard-teacher"></i>
                                                        </a>
                                                    </div>
                                                    
                                                </td>

                                                <td class="text-right">
                                                    <div class="actions">
                                                        <a href="examdeletecore.php?examid=<?php echo $examid ?>" class="btn btn-sm bg-danger-light">
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
        $("#exams").addClass("active");
    </script>