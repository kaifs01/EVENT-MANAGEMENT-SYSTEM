<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("location:index.php");
} else {
    if (isset($_POST['logout'])) {
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
        <?php include ("head_nav.php"); ?>
        <!-- End Header -->

        <!-- ======= Sidebar ======= -->
        <?php include ("side_nav.php"); ?>
        <!-- End Sidebar-->

        <main id="main" class="main">
            <!-- <div class="pagetitle">
            <h1>View Booking Details</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="approved_booking.php">Approved Booking</a></li>
                    <li class="breadcrumb-item active">View Booking Details</li>
                </ol>
            </nav>
        </div> -->
            <!-- End Page Title  -->

            <section class="section dashboard">
                <!-- New Booking -->
                <div class="col-12" id="exampl">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <div class="title">
                                <h5 class="card-title">Booking Invoice</h5>
                            </div>
                            <table class="table align-items-center table-flush table-bordered" border="1">
                                <tbody>
                                    <tr>
                                        <th colspan="5" style="text-align: center;color: red;font-size: 20px">Booking Invoice</th>
                                    </tr>
                                    <?php
                                    $id = $_GET['editid'];

                                    // $select = "SELECT * FROM bookings JOIN events ON bookings.e_id=events.e_id JOIN themes ON bookings.e_id=themes.event_id where bookings.status='Approve' and bookings.id='$id'";

                                    $select = "SELECT * FROM bookings JOIN events ON bookings.eb_id=events.e_id JOIN themes ON bookings.eb_id=themes.event_id where eb_id=$id";


                                    $result = mysqli_query($cn, $select);
                                    while ($row = mysqli_fetch_array($result)) {
                                        ?>

                                        <tr>
                                            <th>Customer Name</th>
                                            <td>
                                                <?php echo $row['c_name']; ?>
                                            </td>
                                            <th>Mobile Number</th>
                                            <td>
                                                <?php echo $row['mobno']; ?>
                                            </td>
                                        </tr>


                                        <tr>
                                            <th>Email</th>
                                            <td>
                                                <?php echo $row['email']; ?>
                                            </td>
                                            <th>Address</th>
                                            <td>
                                                <?php echo $row['address']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Event Name</th>
                                            <td>
                                                <?php echo $row['ev_type']; ?>
                                            </td>
                                            <th>Theme Name</th>
                                            <td>
                                                <?php echo $row['name']; ?>
                                            </td>
                                        </tr>
                                        <tr>

                                            <th>Event Date</th>
                                            <td>
                                                <?php echo $row['ev_date']; ?>
                                            </td>
                                            <th>Event Ending Date</th>
                                            <td>
                                                <?php echo $row['end_ev_date']; ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                            <p style="margin-top:1%" align="center">
                                <i class="bx bxs-printer fa-2x" style="cursor: pointer; font-size: 30px; "
                                    OnClick="CallPrint(this.value)"></i>
                            </p>

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

        <script>
            function CallPrint(strid) {
                var prtContent = document.getElementById("exampl");
                var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
                WinPrint.document.write(prtContent.innerHTML);
                WinPrint.document.close();
                WinPrint.focus();
                WinPrint.print();
                WinPrint.close();
            }
        </script>

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