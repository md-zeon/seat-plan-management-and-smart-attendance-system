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
                        <li class="breadcrumb-item active">Room View</li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-sm-10 ml-5">

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

                    $query5 = "select * from room where roomid='" . $roomid . "';";
                    $result5 = $conn->query($query5);
                    $columncount = 0;
                    if ($result5->num_rows > 0) {
                        while ($row5 = $result5->fetch_assoc()) {
                            $columncount = $row5['columncount'];
                        }
                    }

                    
                    echo "Seat Plan of room number: " . $roomid . "<br>";
                    echo '<div class="csscolumn mb-5" style="column-count:'.$columncount.'; column-gap: 10px;">';
                    foreach ($seats as $seat => $seatval) {
                        if ($seat == 'name') {
                            continue;
                        }

                        if ($seatval == -1) {
                            echo '<span  class="border border-success bg-warning" style="display:block;width:60px;height:60px;text-align: center;
                            vertical-align: middle;line-height: 60px;margin:5px ;break-inside: avoid-column;"></span>';
                        } else {
                            $query = "SELECT * FROM `attendance` WHERE `examid`= '" . $examid . "' and `roomid`='" . $roomid . "' and `seat`='" . $seat . "' and `seatval`='" . $seatval . "';";
                            $result = $conn->query($query);
                            if ($result->num_rows == 0) {
                                echo '<a href="qrcodescanner/index.php?examid=' . $examid . '&roomid=' . $roomid . '&seat=' . $seat . '&seatval=' . $seatval . '" class="border border-success" style="display:block;width:60px;height:60px;text-align: center;
                                vertical-align: middle;line-height: 60px;margin:5px; break-inside: avoid-column;">' . $seatval . '</a>';
                            } else {
                                echo '<a href="qrcodescanner/index.php?examid=' . $examid . '&roomid=' . $roomid . '&seat=' . $seat . '&seatval=' . $seatval . '" class="border border-success bg-success text-white" style="display:block;width:60px;height:60px;text-align: center;
                                vertical-align: middle;line-height: 60px;margin:5px; break-inside: avoid-column;">' . $seatval . '</a>';
                            }
                        }
                    }
                    echo '</div>';
                }

                ?>


            </div>
        </div>



    </div>


    <?php


    include("footer.php");

    ?>

    <script>
        $("#exams").addClass("active");
    </script>