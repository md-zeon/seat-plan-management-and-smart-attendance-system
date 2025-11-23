<?php

include("header.php");

$examid = $_GET['examid'];

?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Room</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Attendence</li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <?php
                $query = "select * from exam where examid='" . $examid . "';";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {

                        $examid  = $row['examid'];
                        $date = $row['date'];
                        $time = $row['time'];
                        $course  = $row['course'];
                    }
                }
                $time = date('h:i A', strtotime($time));
                $query1 = "select * from course where courseid='" . $course . "';";
                $result1 = $conn->query($query1);

                if ($result1->num_rows > 0) {

                    while ($row1 = $result1->fetch_assoc()) {
                        $coursename  = $row1['name'];
                    }
                }




                ?>
                <div>Course Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo $course ?></div>
                <br />
                <div>Course Name &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;<?php echo $coursename ?></div>
                <br />
                <div>Time&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; <?php echo $time ?></div>
                <br />
                <div>Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp; <?php echo $date ?></div>
                <br />
                <form action="attendencelinkmaker.php" metho="GET">
                    <label for="rooms">Select a room&nbsp;&nbsp;&nbsp;:</label>

                    <select name="roomid" id="rooms">

                        <?php

                        $query = "select * from exam where examid='" . $examid . "';";
                        $result = $conn->query($query);
                        $rooms = "";
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $rooms = $row['rooms'];
                            }
                        }

                        $obj = json_decode($rooms);

                        foreach ($obj as $roomid => $seats) {
                            if ($roomid == 'name') {
                                continue;
                            }

                            echo ' <option value="' . $roomid . '">' . $roomid . '</option>';
                        }

                        ?>
                    </select>
                    <hr>
                    <input type="hidden" value="<?php echo $examid ?>" name ="examid"/>
                    <input type="hidden" value="-1" name ="seat"/>
                    <input type="hidden" value="-5" name ="seatval"/>
                    <input type="submit" Value="Start" />
                </form>
                <br>
            </div>
            <div class="col-md-3"></div>
        </div>



    </div>


    <?php


    include("footer.php");

    ?>

    <script>
        $("#exams").addClass("active");
    </script>