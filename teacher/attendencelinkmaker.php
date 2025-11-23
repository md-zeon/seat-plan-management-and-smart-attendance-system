<?php
include_once '../dbconnection.php';
session_start();

$roomida = $_GET['roomid'];
$examida = $_GET['examid'];
$seata = $_GET['seat'];
$seatvala = $_GET['seatval'];


if ($seata == -1) {


    $query = "select * from exam where examid='" . $examida . "';";
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
        foreach ($seats as $seat => $seatval) {
            if ($seat == 'name' || $roomid != $roomida) {
                continue;
            }
            if ($seatval != -1) {
                $next = 'qrcodescanner/index.php?examid=' . $examida . '&roomid=' . $roomid . '&seat=' . $seat . '&seatval=' . $seatval . '';
                echo "<script>
                    window.location.href='" . $next . "';
                    </script>";
                break;
            }
        }
    }
} else {

    $query = "select * from exam where examid='" . $examida . "';";
    $result = $conn->query($query);
    $rooms = "";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $rooms = $row['rooms'];
        }
    }

    $obj = json_decode($rooms);

    foreach ($obj as $roomid => $seats) {
        if ($roomid == 'name' || $roomid != $roomida) {
            continue;
        }
        $ch = false;
        foreach ($seats as $seat => $seatval) {
            // if ($seat == 'name') {
            //     echo "<script>
            // alert('No more students in this room!!!!');
            // window.location.href='attendence.php?examid=" . $examida . "';
            // </script>";
            // }


            if ($seatval != -1 && $ch) {
                $next = 'qrcodescanner/index.php?examid=' . $examida . '&roomid=' . $roomida . '&seat=' . $seat . '&seatval=' . $seatval . '';
     
                echo "<script>
                    window.location.href='" . $next . "';
                    </script>";
                break;
            }

            if ($seat == $seata) {
                $ch = true;
            }
        }
    }
}

echo "<script>
alert('attendance taken for this room');
window.location.href='viewroom.php?examid=" . $examida . "';
</script>";
