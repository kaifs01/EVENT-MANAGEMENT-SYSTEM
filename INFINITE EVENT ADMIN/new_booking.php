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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Infinite-Impress-Event:- New Booking </title>
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

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Aug 30 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <style>
        .title {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>

<body>
    <!-- ======= Header ======= -->
  <?php include("head_nav.php");?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php include("side_nav.php");?>
  <!-- End Sidebar-->

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>New Bookings</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item">Booking Management</li>
                    <li class="breadcrumb-item active">New Bookings</li>
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
                            <h5 class="card-title">New Bookings</h5>
                            <a href="add_newbooking.php" class="btn btn-success">Add Booking</a>
                        </div>
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
                                    <th scope="col">Action</th>
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
                                                    <?php echo $row['status'] = "Pending"; ?>
                                                </span>
                                            </td>

                                        <?php } ?>
                                        <td>
                                            <a href="newbooking_action.php?editid=<?php echo $row['id']; ?>"
                                                class="ed2 btn btn-sm btn-outline-warning"><i class="bx bx-edit"
                                                    aria-hidden="true" title="Take action"></i></a>
                                        </td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                        </table>

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

    <!-- <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('click', '.ed2', function () {
                var edid2 = $(this).attr('id');
                $.ajax({
                    url: "booking_action.php",
                    type: "post",
                    data: { edid2: edid2 }
                });
            });
        });
    </script> -->

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