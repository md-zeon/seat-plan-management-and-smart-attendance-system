<?php
include("header.php");
?>


<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Rooms</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Room Add</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form method="post" action="roomaddcore.php">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="form-title"><span>Room Information</span></h5>
                        </div>
                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>Room ID</label>
                                <input type="text" class="form-control" name="roomid">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Column</label>
                                <input type="text" class="form-control" name="column">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Row</label>
                                <input type="text" class="form-control" name="row">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
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