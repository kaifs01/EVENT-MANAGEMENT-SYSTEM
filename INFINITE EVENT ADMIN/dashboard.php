<?php
session_start();
if(!isset($_SESSION['email']))
{
  header("location:index.php");
}
else{
if (isset ($_POST['logout'])) {
  session_destroy();
  header("location:index.php");
}

$cn = mysqli_connect("localhost", "root", "", "infinite_event");
$profile_image = isset($_SESSION['profile']) ? $_SESSION['profile'] : ''; 

// ========== Insert Record ==========

if (isset ($_POST['add'])) {
  $file_name = $_FILES['preview']['name'];
  $tmpname = $_FILES['preview']['tmp_name'];

  $folder = "assets/img/" . $file_name;

  $name = $_POST['ev_name'];
  $price = $_POST['price'];
  $book = $_POST['booking'];

  $insert = "INSERT INTO `topevent`(`preview`, `ev_name`, `price`, `booking`) VALUES ('$file_name','$name','$price','$book')";

  $exc = mysqli_query($cn, $insert);
}

// ========== Update Record ==========


// if (isset ($_POST['update'])) {
//   $file_name = $_FILES['preview']['name'];
//   $tmpname = $_FILES['preview']['tmp_name'];

//   $folder = "assets/img/" . $file_name;

//   $name = $_POST['ev_name'];
//   $price = $_POST['price'];
//   $book = $_POST['booking'];

//   $update = "UPDATE `topevent` SET `preview`='$file_name',`ev_name`='$name',`price`='$price',`booking`='$book' WHERE `id`='$_GET[edit]'";

//   $exc = mysqli_query($cn, $update);

//   if ($exc) {
//   }
// }

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
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>


      </nav>

    </div>
    <!-- End Page Title  -->
    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- New Booking Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">New Bookings</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-book"></i>
                    </div>
                    <div class="ps-3">

                      <?php
                      $select = "SELECT * FROM `bookings` WHERE status is null";
                      $que = mysqli_query($cn, $select);
                      if ($row = mysqli_num_rows($que)) {
                        ?>
                        <h6>
                          <?php echo $row; ?>
                        </h6>
                      <?php } else { ?>
                        <h6>
                          <?php echo "0"; ?>
                        </h6>
                      <?php } ?>
                      </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End New Booking Card -->

            <!-- Approved Booking Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Approved Booking</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-check"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $select = "SELECT * FROM `bookings` WHERE `status`='Approve'";
                      $que = mysqli_query($cn, $select);
                      if ($row = mysqli_num_rows($que)) {
                        ?>
                        <h6>
                          <?php echo $row; ?>
                        </h6>
                      <?php } else { ?>
                        <h6>
                          <?php echo "0"; ?>
                        </h6>
                      <?php } ?>
                      </h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <!-- End Approved Booking Card -->

            <!-- Cancelled Booking Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Cancelled Booking</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-x"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $select = "SELECT * FROM `bookings` WHERE `status`='Reject'";
                      $que = mysqli_query($cn, $select);
                      if ($row = mysqli_num_rows($que)) {
                        ?>
                        <h6>
                          <?php echo $row; ?>
                        </h6>
                      <?php } else { ?>
                        <h6>
                          <?php echo "0"; ?>
                        </h6>
                      <?php } ?>
                    </div>
                  </div>

                </div>
              </div>

            </div>
            <!-- End Cancelled Booking Card -->

            <!-- Top Events -->
            <div class="col-12">
              <div class="card top-selling overflow-auto" style="height: 570px;">
                <div class="card-body pb-0">
                  <div class="modal-header" style="padding: 20px 0 15px 0;">
                    <h5 class="modal-title" style="float: left;font-weight: 500; color: #012970; 
                    font-family: 'Poppins', sans-serif;">Top Events</h5>
                    <div class="card-tool" style="float: right;">
                      <button type="button" onclick="document.getElementById('id01').style.display='block'"
                        class="btn btn-success" data-bs-toggle="modal" data-bs-target="add_tev">Add
                        Top Events</button>
                    </div>
                  </div>



                  <div class="modal" id="id01">
                    <?php @include "form.php"; ?>
                  </div>


                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Preview</th>
                        <th scope="col">Event Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Bookings</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      $select = "SELECT * FROM `topevent`";
                      $result = mysqli_query($cn, $select);
                      while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                        <tr>
                          <td><a href="#"><img src="assets/img/<?php echo $row['preview'] ?>"></a></td>
                          <td><a href="#" class="text-primary fw-bold">
                              <?php echo $row['ev_name'] ?>
                            </a></td>
                          <td>
                            <?php echo $row['price'] ?>
                          </td>
                          <td class="fw-bold">
                            <?php echo $row['booking'] ?>
                          </td>
                        </tr>

                        <?php
                      }
                      ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div>
            <!-- End Top Events -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">
          <!-- demanding services -->
          <div class="card">
            <div class="card-body pb-0">
              <h5 class="card-title">Demanding Services</h5>

              <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#trafficChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {

                      top: '0',
                      left: 'center'
                    },
                    series: [{
                      type: 'pie',
                      radius: ['40%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '16',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: false
                      },
                      data: [{
                        value: 1048,
                        name: 'Wedding Events'
                      },
                      {
                        value: 735,
                        name: 'Birthday Party'
                      },
                      {
                        value: 580,
                        name: 'Photography'
                      },
                      {
                        value: 484,
                        name: 'Engagement'
                      },
                      {
                        value: 300,
                        name: 'Collage Events'
                      }
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div>
          <!-- End demanding services -->

          <!-- Reviews -->
          <div class="card rv">
            <div class="card-body">
              <div class="card-title">Reviews</div>

              <div class="progresslist" style="height: 176px; overflow-y: scroll;">
                <div class="pItem">
                  <p>5 Star</p>
                  <div class="pArea progress">
                    <span class="pbar" style="width: 5%;"></span>
                    <span class="pText">5%</span>
                  </div>
                </div>

                <div class="pItem">
                  <p>5 Star</p>
                  <div class="pArea progress">
                    <span class="pbar" style="width: 25%;"></span>
                    <span class="pText">25%</span>
                  </div>
                </div>

                <div class="pItem">
                  <p>5 Star</p>
                  <div class="pArea progress">
                    <span class="pbar" style="width: 50%;"></span>
                    <span class="pText">50%</span>
                  </div>
                </div>

                <div class="pItem">
                  <p>5 Star</p>
                  <div class="pArea progress">
                    <span class="pbar" style="width: 75%;"></span>
                    <span class="pText">75%</span>
                  </div>
                </div>

                <div class="pItem">
                  <p>5 Star</p>
                  <div class="pArea progress">
                    <span class="pbar" style="width: 75%;"></span>
                    <span class="pText">75%</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Reviews -->
      </div>
      <!-- End Right side columns -->

      <!-- New Booking -->
      <div class="col-12">
        <div class="card recent-sales overflow-auto">
          <div class="card-body">
            <h5 class="card-title"><a href="new_booking.php" style="color: #012970;">New Bookings</a></h5>
            
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Customer Name</th>
                  <th scope="col">Mobile Number</th>
                  <th scope="col">Email</th>
                  <th scope="col">Event</th>
                  <th scope="col">Booking Date</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $select = "SELECT * FROM `bookings` WHERE status is null";
                $result = mysqli_query($cn, $select);
                while ($row = mysqli_fetch_assoc($result)) {
                  ?>

                  <tr>
                    <th scope="row">
                      <?php echo $row['id']; ?>
                    </th>
                    <td>
                      <?php echo $row['c_name']; ?>
                    </td>
                    <td>
                      <?php echo $row['mobno']; ?>
                    </td>
                    <td><a href="#" class="text-primary">
                        <?php echo $row['email']; ?>
                      </a></td>
                    <td>
                      <?php echo $row['ev_type']; ?>
                    </td>
                    <td>
                      <?php echo $row['booking_date']; ?>
                    </td>

                    <?php if ($row['status'] = "") { ?>

                      <td>
                        <span class="badge">
                          <?php echo "not set"; ?>
                        </span>
                      </td>

                    <?php } else { ?>

                      <td>
                        <span class="badge bg-warning">
                          <?php echo $row['status'] = "pending"; ?>
                        </span>
                      </td>

                    <?php } ?>

                  </tr>

                <?php } ?>
              </tbody>
            </table>

          </div>

        </div>
      </div>
      <!-- End New Booking -->

      </div>
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