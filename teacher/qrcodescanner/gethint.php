<?php

  $q = $_REQUEST["q"];
  $examid = $_REQUEST["examid"];
  $roomid = $_REQUEST["roomid"];
  $seat = $_REQUEST["seat"];
  $seatval = $_REQUEST["seatval"];




  $con = mysqli_connect('localhost', 'root', '', 'exammanagement');

  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  if ($q == $seatval) {
    $query = "SELECT * FROM `attendance` WHERE `examid`= '" . $examid . "' and `roomid`='" . $roomid . "' and `seat`='" . $seat . "' and `seatval`='" . $seatval . "';";
    $result = $con->query($query);
    if ($result->num_rows == 0) {
      $query = "INSERT INTO `attendance`(`examid`, `roomid`, `seat`, `seatval`) VALUES ('" . $examid . "','" . $roomid . "','" . $seat . "','" . $seatval . "')";
      $result = $con->query($query);
    }


    echo '<div class="alert alert-success"><strong>Correct Seat!</strong>Seat verification Done</div>';
  } else {
    echo '<div class="alert alert-warning"><strong>Wrong Seat!</strong>Please check your seat carefully</div>';
  }
  ?>
