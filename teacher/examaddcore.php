<?php
include_once '../dbconnection.php';
session_start();



$date = $_POST['date'];
$time = $_POST['time'];
$course = $_POST['course'];
$rooms = $_POST['rooms'];

$query = "select * from enroll where courseid='" . $course . "';";
$result = $conn->query($query);

$student = array();
while ($row = $result->fetch_assoc()) {
    array_push($student, $row['studentid']);
}

$seat =  $result->num_rows;
$c = 0;
foreach ($rooms as &$room) {
    $sp = explode("@", $room);

    $roomid = $sp[0];
    $capacity = $sp[1];
    $used = $sp[2];
    $space = $capacity - $used;
    $c += $space;
}
$ind = 0;

if ($c < $seat) {
    echo "Not enough space,need More Rooms.";
    echo "<script>
    alert('Something went wrong.');
    window.location.href='examadd.php';
    </script>";
} else {
    $json = '{"name":"room"';
    foreach ($rooms as &$room) {
        $sp = explode("@", $room);

        $roomid = $sp[0];
        $capacity = $sp[1];
        $used = $sp[2];
        $space = $capacity - $used;
        $u = 0;
        $json = $json.',"'.$roomid.'":{"name":"seat"';
        for ($i = 0; $i < $capacity; $i++) {
            if ($i >= $used && $ind < sizeof($student)) {
                $json = $json . ',"' . $i . '":' . $student[$ind++];
                $u++;
            } else {
                $json = $json . ',"' . $i . '":' . -1;
            }
            
        }
        $json = $json.'}';
        
       

        $query = "select * from avaiableseat where date='" . $date . "' and room='" . $roomid . "';";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $query = "UPDATE avaiableseat
            SET used =used+'" . $u . "' where date='" . $date . "' and room='" . $roomid . "';";
            $result = $conn->query($query);
        } else {
            $query = "INSERT INTO `avaiableseat`(`room`, `date`, `used`) VALUES ('" . $roomid . "','" . $date . "','" . $u . "')";
            $result = $conn->query($query);
        }

        
    }
    $json = $json . "}";
    

    $query = "INSERT INTO `exam`(`date`, `time`, `course`, `rooms`) VALUES ('" . $date . "','" . $time . "','" . $course . "','" . $json . "')";
    $result = $conn->query($query);
    echo "Exam Added.";

    echo "<script>
    window.location.href='examlist.php';
    </script>";
}
