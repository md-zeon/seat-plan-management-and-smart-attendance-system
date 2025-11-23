<?php
include("header.php");
?>
<div class="page-wrapper">
   <div class="content container-fluid">
      <div class="page-header">
         <div class="row">
            <div class="col-sm-12">
               <h3 class="page-title">Welcome Teacher!</h3>
               <ul class="breadcrumb">
                  <li><a href="index.php" class="breadcrumb-item active">Dashboard</a></li>
               </ul>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-xl-3 col-sm-6 col-12 d-flex">
            <div class="card bg-one w-100">
               <div class="card-body">
                  <div class="db-widgets d-flex justify-content-between align-items-center">
                     <div class="db-icon">
                        <i class="fas fa-user-graduate"></i>
                     </div>
                     <div class="db-info">
                        <?php
                        $query = "select * from student;";
                        $result = $conn->query($query);

                        $students = $result->num_rows;
                        ?>
                        <h3><?php echo $students ?></h3>
                        <h6>Students</h6>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-sm-6 col-12 d-flex">
            <div class="card bg-two w-100">
               <div class="card-body">
                  <div class="db-widgets d-flex justify-content-between align-items-center">
                     <div class="db-icon">
                        <i class="fas fa-crown"></i>
                     </div>
                     <div class="db-info">

                        <h3>50+</h3>
                        <h6>Awards</h6>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-sm-6 col-12 d-flex">
            <div class="card bg-three w-100">
               <div class="card-body">
                  <div class="db-widgets d-flex justify-content-between align-items-center">
                     <div class="db-icon">
                        <i class="fas fa-building"></i>
                     </div>
                     <div class="db-info">
                        <?php
                        $query = "select * from course;";
                        $result = $conn->query($query);

                        $courses = $result->num_rows;
                        ?>
                        <h3><?php echo $courses ?></h3>
                        <h6>Department</h6>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-sm-6 col-12 d-flex">
            <div class="card bg-four w-100">
               <div class="card-body">
                  <div class="db-widgets d-flex justify-content-between align-items-center">
                     <div class="db-icon">
                        <i class="fas fa-file-invoice-dollar"></i>
                     </div>
                     <div class="db-info">
                        <?php
                        $query = "select * from Teacher;";
                        $result = $conn->query($query);

                        $teachers = $result->num_rows;
                        ?>
                        <h3><?php echo $teachers ?></h3>
                        <h6>Teachers</h6>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- <div class="row">
         <div class="col-xl-3 col-sm-6 col-12">
            <div class="card flex-fill fb sm-box">
               <i class="fab fa-facebook"></i>
               <h6>50,095</h6>
               <p>Likes</p>
            </div>
         </div>
         <div class="col-xl-3 col-sm-6 col-12">
            <div class="card flex-fill twitter sm-box">
               <i class="fab fa-twitter"></i>
               <h6>48,596</h6>
               <p>Follows</p>
            </div>
         </div>
         <div class="col-xl-3 col-sm-6 col-12">
            <div class="card flex-fill insta sm-box">
               <i class="fab fa-instagram"></i>
               <h6>52,085</h6>
               <p>Follows</p>
            </div>
         </div>
         <div class="col-xl-3 col-sm-6 col-12">
            <div class="card flex-fill linkedin sm-box">
               <i class="fab fa-linkedin-in"></i>
               <h6>69,050</h6>
               <p>Follows</p>
            </div>
         </div>
      </div> -->
   </div>


   <?php
   include("footer.php");
   ?>

   <script>
      $("#dashboard").addClass("active");
   </script>