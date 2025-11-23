<?php
include_once '../dbconnection.php';
session_start();

if (!isset($_SESSION['user']) || strcmp($_SESSION['user'], "admin") != 0) {
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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">
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
                    <img src="assets/img/logo.png" alt="Logo"> JU
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
                        <li class="submenu" id="students">
                            <a href="#"><i class="fas fa-user-graduate"></i> <span> Students</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="studentlist.php">Student List</a></li>
                                <li><a href="studentadd.php">Student Add</a></li>
                            </ul>
                        </li>
                        <li id="teachers">
                            <a href="teacherlist.php"><i class="fas fa-chalkboard-teacher"></i> <span>
                                    Teachers</span></a>

                        </li>

                        <li class="submenu" id="courses">
                            <a href="#"><i class="fas fa-book-reader"></i> <span> Courses</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="courselist.php">Course List</a></li>
                                <li><a href="courseadd.php">Course Add</a></li>
                            </ul>
                        </li>

                        <li class="submenu" id="rooms">
                            <a href="#"><i class="fas fa-hotel"></i> <span> Rooms</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="roomlist.php">Room List</a></li>
                                <li><a href="roomadd.php">Room Add</a></li>
                            </ul>
                        </li>

                        <li class="menu-title">
                            <span>Management</span>
                        </li>


                        <li class="submenu" id="exams">
                            <a href="#"><i class="fas fa-clipboard-list"></i> <span> Exam </span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="examlist.php">Exam List</a></li>
                                <li><a href="examadd.php">Exam Add</a></li>
                            </ul>
                        </li>
                        <li class="menu-title">
                            <span>Pages</span>
                        </li>
                        <li class="submenu" id="actions">
                            <a href="#"><i class="fas fa-shield-alt"></i> <span> Action </span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="changepassword.php">Change Password</a></li>
                                <li><a href="logout.php">Log Out</a></li>
                            </ul>

                        </li>




                    </ul>
                </div>
            </div>
        </div>