<?php
include("header.php");
?>


<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Exams</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Exam Add</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form method="post" action="examaddcore.php">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="form-title"><span>Room Information</span></h5>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Exam Date</label>
                                <input required type="date" class="form-control" id="examdate" name="date">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Exam time</label>
                                <input required type="time" class="form-control" name="time">
                            </div>
                        </div>

                        <div class="col-12 col-sm-12">
                            <div class="form-group">
                                <label>Select Course</label>
                                <select required class="form-control" aria-label="Default select example" id="course" name="course">
                                    <option selected disabled>Open this select menu</option>
                                    <?php
                                    $query = "select * from course;";
                                    $result = $conn->query($query);

                                    if ($result->num_rows > 0) {

                                        while ($row = $result->fetch_assoc()) {

                                            $courseid  = $row['courseid'];
                                            $name = $row['name'];
                                    ?>

                                            <option value="<?php echo $courseid ?>"> <?php echo $courseid . " " . $name ?> </option>
                                    <?php }
                                    } ?>
                                </select>
                                Total students:<span id="totalstudent" style="color:green">0</span>
                            </div>

                        </div>


                        <!--- roooms will append-->
                        <div class="col-12 col-sm-12 " id="div1">

                        </div>


                        

                </form>
            </div>
        </div>
    </div>
</div>




<?php

include("footer.php");
?>
<script>
   

   


    $('#course').on('keyup change', function() {
        var values = {
            'course': document.getElementById('course').value,
        };

        $.ajax({
            url: "gettotalstudent.php",
            type: "POST",
            data: values,
            async: false,
            success: function(result) {
                $("#totalstudent").html(result);
            }
        });
    });


    $('#examdate,#course').on('keyup change', function() {
        var values = {
            'examdate': document.getElementById('examdate').value,
            'need': document.getElementById('totalstudent').innerHTML,
        };
        $.ajax({
            url: "getrooms.php",
            type: "POST",
            data: values,
            success: function(result) {
                $("#div1").html(result);
            }
        });
    });

   
</script>


<script>
        $("#exams").addClass("active");
    </script>