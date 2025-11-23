<?php

use setasign\Fpdi\Fpdi;

include_once '../../dbconnection.php';
session_start();

if (!isset($_SESSION['user']) || !strcmp($_SESSION['user'], "student") == 0) {
    header("Location:../index.php");
}

$studentid = $_SESSION['studentid'];
$studentname  = "";

$query = "select * from student where studentid='" . $studentid . "';";
$result = $conn->query($query);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        $studentname  = $row['name'];
    }
}



require_once('fpdf/fpdf.php');
require_once('fpdi2/src/autoload.php');


$pdf = new Fpdi();

$pdf->AddPage();

$pdf->setSourceFile('card.pdf');

$tplIdx = $pdf->importPage(1);

$pdf->useTemplate($tplIdx, 0, 0, 210);

$pdf->SetFont('Times');
$pdf->SetFontSize(10);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(37, 87);
$pdf->Write(0, $studentname);

$image1 = "../qrmaker/temp/" . $studentid . ".png";
$pdf->Cell(40, 40, $pdf->Image($image1, 145, 23, 50), 100, 100, 'L', false);








$pdf->SetXY(155, 93);
$pdf->Write(0, $studentid);

$query = "select * from enroll where studentid='" . $studentid . "';";
$result = $conn->query($query);
$y = 113;
$pdf->SetFontSize(9);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        $courseid  = $row['courseid'];
        $coursename = "";
        $query1 = "select * from course where courseid='" . $courseid . "';";
        $result1 = $conn->query($query1);
        if ($result1->num_rows > 0) {

            while ($row1 = $result1->fetch_assoc()) {
                $coursename  = $row1['name'];
            }
        }
        $date = date("Y-m-d");

        $query2 = "select * from exam where course='" . $courseid . "';";

        $result2 = $conn->query($query2);
        if ($result2->num_rows > 0) {

            while ($row2 = $result2->fetch_assoc()) {
                $examtime  = $row2['time'];
                $examroom  = $row2['rooms'];
                $examtime =  $row2['time'];
                $examdate =  $row2['date'];
                $room = "";
                $obj = json_decode($examroom);

                foreach ($obj as $roomid => $seats) {
                    if ($roomid == 'name') {
                        continue;
                    }
                    $room = $room . " " . $roomid . ",";
                }

                $o = $courseid . ": " . $coursename . "(rooms: " . $room . "    " . $examtime . ",    " . $examdate . ")";

                $pdf->SetXY(37, $y);
                
                if($y==113){
                    $pdf->SetFontSize(10);
                    $pdf->Cell(20, 5, "Course Id", 1, 0, 'C', 0);
                    $pdf->Cell(40, 5, "Course Name", 1, 0, 'C', 0);
                    $pdf->Cell(20, 5, "Time", 1, 0, 'C', 0);
                    $pdf->Cell(22, 5, "Date", 1, 0, 'C', 0);
                    $y += 5;
                    $pdf->SetFontSize(9);
                }

                $pdf->SetXY(37, $y);



                $examtime = date('h:i A', strtotime($examtime));;
                $pdf->Cell(20, 5, $courseid, 1, 0, 'C', 0);
                $pdf->Cell(40, 5, $coursename, 1, 0, 'C', 0);
                $pdf->Cell(20, 5, $examtime, 1, 0, 'C', 0);
                $pdf->Cell(22, 5, $examdate, 1, 0, 'C', 0);

                $y += 5;
            }
        }
    }
}
 


$pdf->Output('I', $studentid . '.pdf');
