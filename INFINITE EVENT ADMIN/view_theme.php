<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("location:index.php");
} else {
  if (isset($_POST['logout'])) {
    session_destroy();
    header("location:index.php");
  }

  // Establish database connection
  $cn = mysqli_connect("localhost", "root", "", "infinite_event");

  // Check if theme_id and event_id are provided in the URL
  if (isset($_GET['theme_id']) && isset($_GET['event_id'])) {
    //
    $theme_id = mysqli_real_escape_string($cn, $_GET['theme_id']);
    $event_id = mysqli_real_escape_string($cn, $_GET['event_id']);

    // Delete theme query
    $delete_query = "DELETE FROM themes WHERE theme_id = '$theme_id' AND event_id = '$event_id'";

    // Execute the deletion query
    $result = mysqli_query($cn, $delete_query);

    if ($result) {
      // Deletion successful
      echo "<script>alert('Theme deleted successfully.');</script>";
      // Redirect to the page where themes are displayed
      echo "<script>window.location.href = 'add_event1.php?event_id=$event_id';</script>";
      exit;
    } else {
      // Deletion failed
      echo "<script>alert('Failed to delete theme.');</script>";
      // Redirect to the page where themes are displayed
      echo "<script>window.location.href = 'add_event1.php?event_id=$event_id';</script>";
      exit;
    }
  }

  // Close database connection
  mysqli_close($cn);
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
      .title {
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

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


    <!-- ======= Header ======= -->
    <?php include ("head_nav.php"); ?>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <?php include ("side_nav.php"); ?>
    <!-- End Sidebar-->

    <main id="main" class="main">
      <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Theme Details</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title  -->
      <section class="section dashboard">
        <!-- New Booking -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">
            <div class="card-body">
              <div class="title">

                <h5 class="card-title">Themes</h5>

                <a href="add_event1.php" class="btn btn-danger">Back</a>
              </div>
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Short Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Creation Date</th>
                    <th scope="col">Updated Date</th>

                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (!$cn) {
                    die("Connection failed: " . mysqli_connect_error());
                  }

                  // Check if the 'add_theme' parameter is present in the URL
                  if (isset($_GET['add_theme'])) {
                    // Sanitize the input to prevent SQL injection
                    $event_id = mysqli_real_escape_string($cn, $_GET['add_theme']);


                    // Fetch themes associated with the specified event
                    $sql = "SELECT * FROM themes WHERE event_id = '$event_id'";
                    $result = mysqli_query($cn, $sql);

                    // Check if any themes are found
                    if (mysqli_num_rows($result) > 0) {
                      // Display themes in a table
                      // echo "<h2>Themes for Event ID: $event_id</h2>";
                

                      while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['theme_id'] . "</td>";
                        echo "<td><img src='assets/img/" . $row['image'] . "' alt='Theme Image' style='width: 100px; height: auto;'></td>";

                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['des'] . "</td>";
                        echo "<td>" . $row['sded'] . "</td>";
                        echo "<td>" . $row['t_price'] . "</td>";
                        echo "<td>" . $row['created_at'] . "</td>";
                        echo "<td>" . $row['updated_at'] . "</td>";
                        echo "<td>
        <a href='edit_theme.php?edit=" . $row['theme_id'] . "' class='btn btn-outline-warning btn-sm' title='Edit Theme'><i class='bx bx-edit'></i></a>
        <a href='view_theme.php?theme_id=" . $row['theme_id'] . "&event_id=" . $event_id . "' onclick=\"return confirm('Are you sure you want to delete this theme?');\" class='btn btn-outline-danger btn-sm' title='Delete Theme'>
        <i class='bx bx-trash'></i>
    </a>


        
        
      </td>";
                        echo "</tr>";
                      }

                      echo "</table>";
                    } else {
                      echo "No themes found for Event ID: $event_id";
                    }
                  } else {
                    echo "Event ID is missing in the URL.";
                  }

                  // Close the connection
                  mysqli_close($cn);
                  ?>
                </tbody>



            </div>

          </div>
        </div>
        <!-- End New Booking -->
      </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
      <div class="copyright">
        &copy; Copyright <strong><span>Infinite Impress</span></strong>. All Rights Reserved
      </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

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
<?php } ?>