<?php
$cn = mysqli_connect("localhost", "root", "", "infinite_event");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style_review.css">

  <style>
    .dashboard .top-selling img {
      border-radius: 5px;
      max-width: 100px;
    }

    .header .header-nav .notifications {
      width: 700px;
    }
  </style>
  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Aug 30 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="add_event1.php">
          <i class="bi bi-menu-button-wide"></i>
          <span>Manage Event</span>
        </a>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="manage_services.php">
          <i class="bi bi-tools"></i>
          <span>Manage Service</span>
        </a>
      </li><!-- End Manage Service Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Booking Management</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="new_booking.php" class="unline">
              <i class="bi bi-circle"></i><span>New Bookings</span>
            </a>
          </li>
          <li>
            <a href="cancelled_booking.php" class="unline">
              <i class="bi bi-circle"></i><span>Cancelled Bookings</span>
            </a>
          </li>
          <li>
            <a href="approved_booking.php" class="unline">
              <i class="bi bi-circle"></i><span>Approved Bookings</span>
            </a>
          </li>
          <li>
            <a href="reject_booking.php" class="unline">
              <i class="bi bi-circle"></i><span>Reject Bookings</span>
            </a>
          </li>


        </ul>
      </li><!-- End Booking Management Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="manage_user.php">
          <i class="bx bxs-group"></i>
          <span>User Management </span>
        </a>
      </li><!-- End User Management Nav --> 

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#report-nav" data-bs-toggle="collapse" href="#">
          <i class="bx bxs-report"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="report-nav" class="nav-content collapse unline" data-bs-parent="#sidebar-nav">
          <li>
            <a href="eventlist_report.php" class="unline">
              <i class="bi bi-circle"></i><span>Event List Reports</span>
            </a>
          </li>
          <li>
            <a href="themelist_report.php" class="unline">
              <i class="bi bi-circle"></i><span>Theme List Reports</span>
            </a>
          </li>
          <li>
            <a href="booking_report.php" class="unline">
              <i class="bi bi-circle"></i><span>Bookings Reports</span>
            </a>
          </li>
          <li>
            <a href="payment_report.php" class="unline">
              <i class="bi bi-circle"></i><span>Payments Reports</span>
            </a>
          </li>

        </ul>
      </li><!-- End Reports Nav -->


      <!-- <li class="nav-heading">SERVICES</li> -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!- End F.A.Q Page Nav ->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Emails</span>
        </a> -->
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="logout.php">
          <i class="bi bi-box-arrow-in-left"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Login Page Nav -->



    </ul>

  </aside><!-- End Sidebar-->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>