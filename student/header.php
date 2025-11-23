<?php
include_once '../dbconnection.php';
session_start();

if (!isset($_SESSION['user']) || !strcmp($_SESSION['user'], "student") == 0) {
    header("Location:../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Exam - Dashboard</title>
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
            <div class="header-left">
                <a href="index.php" class="logo">
                    <img src="assets/img/logo.png" alt="Logo"> BUBT
                </a>
                <a href="index.php" class="logo logo-small">
                    <img src="assets/img/logo-small.png" alt="Logo" width="30" height="30">
                </a>
            </div>
            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fas fa-align-left"></i>
            </a>
            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>

        </div>
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">
                            <span>Main Menu</span>
                        </li>
                        <li id="dashboard">
                            <a href="index.php"><i class="fas fa-user-graduate"></i> <span> Dashboard</span></a>

                        </li>


                        <li id="courses">
                            <a href="courselist.php"><i class="fas fa-book-reader"></i> <span> Course List</span></a>

                        </li>






                        <li id="exams">
                            <a href="examlist.php"><i class="fas fa-book-reader"></i> <span>Exam List</span></a>

                        </li>



                        <li id="changepassword">
                            <a href="changepassword.php"><i class="fas fa-unlock-alt"></i> Change Password</a>
                        </li>

                        <li id="admitcard">
                            <a href="qrmaker"><i class="fas fa-credit-card"></i>Admit Card</a>
                        </li>


                        <li><a href="logout.php"><i class='fas fa-sign-out-alt'></i> Log Out</a></li>



                    </ul>
                </div>
            </div>
        </div>