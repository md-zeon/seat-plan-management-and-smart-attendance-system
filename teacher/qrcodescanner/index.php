<?php
session_start();

if (!isset($_SESSION['user']) || !strcmp($_SESSION['user'], "teacher") == 0) {
  header("Location:../index.php");
}
include("header.php");


$examid = $_GET['examid'];
$roomid = $_GET['roomid'];
$seat = $_GET['seat'];
$seatval = $_GET['seatval'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <title>Preskool - Dashboard</title>
  <link rel="shortcut icon" href="../assets/img/favicon.png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">
  <link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
  <link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
  <style>
    .result {
      background-color: green;
      color: #fff;
      padding: 20px;
    }

    .row {
      display: flex;
    }
  </style>

</head>

<body>






  <script src="ht.js"></script>
  <div class="page-wrapper">
    <div class="content container">
      <div class="row justify-content-center">

        <div class="col">
          <div style="width:500px;" id="reader"></div>
        </div>
        <audio id="correct">
          <source src="correct.mp3" type="audio/ogg">
        </audio>
        <audio id="wrong">
          <source src="wrong.mp3" type="audio/ogg">
        </audio>


        <div id="examid" style="display: none;"><?php echo $examid ?></div>
        <div id="roomid" style="display: none;"><?php echo $roomid ?></div>
        <div id="seat" style="display: none;"><?php echo $seat ?></div>
        <div id="seatval" style="display: none;"><?php echo $seatval ?></div>

        <div class="col" style="padding:30px;">
          <h4>SCAN RESULT</h4>
          <div>Student Id</div>
          <form action="">
            <input type="text" name="start" class="input" id="result" onkeyup="showHint(this.value)" placeholder="result here" readonly="" />
          </form>
          <p>Status: <span id="txtHint"></span></p>
          <a href="../viewroom.php?examid=<?php echo $examid ?>" class="btn btn-info">View Attendance</a>
        </div>
      </div>

      <br>

      <div class="row justify-content-center">
        <h1 class="text-center">OR</h1>
      </div>


      <div class="row justify-content-center">
        <form id="form">
          <input type="text" placeholder="Enter student id" name="q">
          <input type="hidden" name="examid" value="<?php echo $examid ?>">
          <input type="hidden" name="roomid" value="<?php echo $roomid ?>">
          <input type="hidden" name="seat" value="<?php echo $seat ?>">
          <input type="hidden" name="seatval" value="<?php echo $seatval ?>">
          <input type="submit" id="submitButton">
        </form>
      </div>
      <hr>
      <div class="row justify-content-center">
        <form action="../attendencelinkmaker.php">
          <input type="hidden" name="examid" value="<?php echo $examid ?>">
          <input type="hidden" name="roomid" value="<?php echo $roomid ?>">
          <input type="hidden" name="seat" value="<?php echo $seat ?>">
          <input type="hidden" name="seatval" value="<?php echo $seatval ?>">
          <input type="submit" value="SKIP">
          <input type="submit" value="NEXT">
        </form>

      </div>
    </div>
  </div>
  <hr>

  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-8">
      <?php
      $roomida = $_GET['roomid'];
      $seata = $_GET['seat'];

      $query = "select * from exam where examid='" . $examid . "';";
      $result = $conn->query($query);
      $rooms = "";
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $rooms = $row['rooms'];
        }
      }

      $obj = json_decode($rooms);


      foreach ($obj as $roomId => $seats) {
        if ($roomId == 'name' || $roomId != $roomida) {
          continue;
        }

        $query5 = "select * from room where roomid='" . $roomId . "';";
        $result5 = $conn->query($query5);
        $columncount = 0;
        if ($result5->num_rows > 0) {
          while ($row5 = $result5->fetch_assoc()) {
            $columncount = $row5['columncount'];
            $capacity = $row5['capacity'];
          }
        }



        echo "Seat Plan of room number: " . $roomId . "<br>";
        echo '<div class="csscolumn mb-5" style="column-count:' . (ceil(($seata + 1) / (float)($capacity / $columncount))) . '; column-gap: 10px;">';
        foreach ($seats as $seat => $seatval) {
          // echo $seat;

          if ($seat == 'name') {
            continue;
          }
          if ($seat > $seata) {
            break;
          }
        
          if ($seatval == -1) {
            echo '<span  class="border border-success bg-warning" style="display:block;width:60px;height:60px;text-align: center;
                            vertical-align: middle;line-height: 60px;margin:5px ;break-inside: avoid-column;"></span>';
          } else {
            $query = "SELECT * FROM `attendance` WHERE `examid`= '" . $examid . "' and `roomid`='" . $roomId . "' and `seat`='" . $seat . "' and `seatval`='" . $seatval . "';";
            $result = $conn->query($query);
            if ($result->num_rows == 0) {
              echo '<span class="border border-success" style="display:block;width:60px;height:60px;text-align: center;
                                vertical-align: middle;line-height: 60px;margin:5px; break-inside: avoid-column;">' . $seatval . '</span>';
            } else {
              echo '<span class="border border-success bg-success text-white" style="display:block;width:60px;height:60px;text-align: center;
                                vertical-align: middle;line-height: 60px;margin:5px; break-inside: avoid-column;">' . $seatval . '</span>';
            }
          }
        }


        $row = $capacity / $columncount;
        $seatb = $seata + 1;
        $tot = (int)($seatb / $row + 1) * $row;
        if ($seatb % $row == 0) {
          $tot -= $row;
        }

        for ($k = $seatb; $k < $tot; $k++) {
          echo '<span  style="display:block;width:60px;height:60px;text-align: center;
                      vertical-align: middle;line-height: 60px;margin:5px; break-inside: avoid-column;"></span>';
        }


        echo '</div>';
      }

      ?>


    </div>
  </div>


  </div>

  <script src="../assets/js/jquery-3.6.0.min.js"></script>
  <script src="../assets/js/popper.min.js"></script>
  <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
  <script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
  <script src="../assets/js/script.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>


  <script type="text/javascript">
    var correct = document.getElementById("correct");
    var wrong = document.getElementById("wrong");

    function showHint(str) {
      if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";

        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        var examid = document.getElementById("examid").innerHTML;
        var roomid = document.getElementById("roomid").innerHTML;
        var seat = document.getElementById("seat").innerHTML;
        var seatval = document.getElementById("seatval").innerHTML;
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint").innerHTML = this.responseText;
            console.log(this.responseText);
            if (this.responseText == '<div class="alert alert-success"><strong>Correct Seat!</strong>Seat verification Done</div>') {
              correct.play();
              console.log("tt");
            } else {
              wrong.play();
              console.log("kk");
            }
          }
        };
        xmlhttp.open("GET", "gethint.php?q=" + str + "&examid=" + examid + "&roomid=" + roomid + "&seat=" + seat + "&seatval=" + seatval, true);
        xmlhttp.send();
      }
    }







    function onScanSuccess(qrCodeMessage) {
      document.getElementById("result").value = qrCodeMessage;
      showHint(qrCodeMessage);


    }

    function onScanError(errorMessage) {
      //handle scan error
    }
    var html5QrcodeScanner = new Html5QrcodeScanner(
      "reader", {
        fps: 10,
        qrbox: 250
      });
    html5QrcodeScanner.render(onScanSuccess, onScanError);


    $(() => {

      $("#submitButton").click(function(ev) {
        var form = $("#form");
        var url = "gethint.php";
        ev.preventDefault();
        $.ajax({
          type: "GET",
          url: url,
          data: form.serialize(),
          success: function(data) {
            document.getElementById("txtHint").innerHTML = data;
            if (data == '<div class="alert alert-success"><strong>Correct Seat!</strong>Seat verification Done</div>') {
              location.reload();
            }
          },
          error: function(data) {
            alert("some Error");

          }
        });

      });
    });
  </script>