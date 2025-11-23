<?php
include("header.php");
?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Rooms</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Room List</li>
                    </ul>
                </div>
                <div class="col-auto text-right float-right ml-auto">
                    <a href="roomAdd.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                                        <th>Room ID</th>
                                        <th>Column</th>
                                        <th>Row</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    $query = "select * from room;";
                                    $result = $conn->query($query);

                                    if ($result->num_rows > 0) {

                                        while ($row = $result->fetch_assoc()) {

                                            $roomid  = $row['roomid'];
                                            $column  = $row['columncount'];
                                            $capacity = $row['capacity'];
                                    ?>
                                            <tr>
                                                <td><?php echo $roomid   ?></td>
                                                <td><?php echo $column  ?></td>
                                                <td><?php echo $capacity/$column  ?></td>
                                                <td class="text-right">
                                                    <div class="actions">
                                                        <a href="roomdeletecore.php?roomid=<?php echo $roomid  ?>" class="btn btn-sm bg-danger-light">
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
        $("#rooms").addClass("active");
    </script>