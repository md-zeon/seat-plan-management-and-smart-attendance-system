<?php
include("header.php");
?>


<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Password</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Change Password</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form method="post" action="changepasswordcore.php">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="form-title"><span>Password Information</span></h5>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Previous password</label>
                                <input type="text" class="form-control" name="previouspassword">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="text" class="form-control" name="newpassword">
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
        $("#changepassword").addClass("active");
    </script>