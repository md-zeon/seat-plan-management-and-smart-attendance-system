<?php
include("header.php");
?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Teachers</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Teacher List</li>
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
                                        <th>Name</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    $query = "select * from teacher;";
                                    $result = $conn->query($query);

                                    if ($result->num_rows > 0) {

                                        while ($row = $result->fetch_assoc()) {

                                            $teacherid = $row['teacherid'];
                                            $name = $row['name'];
                                    ?>
                                            <tr>
                                                <td><?php echo $teacherid  ?></td>
                                                <td><?php echo $name  ?></td>
                                                <td class="text-right">
                                                    <div class="actions">
                                                        <a href="teacherdeletecore.php?teacherid=<?php echo $teacherid ?>" class="btn btn-sm bg-danger-light">
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
        $("#teachers").addClass("active");
    </script>