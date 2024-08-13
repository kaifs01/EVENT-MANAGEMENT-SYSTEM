<?php
session_start();

include ("db/cn.php");

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

    <style media="screen">
        *,
        *:before,
        *:after {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .background {
            width: 430px;
            height: 520px;
            position: absolute;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
        }

        .add_ev {
            /* overflow-y: scroll;
            height: 520px;
            width: 400px; */
            /* position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 20px 20px 60px #00000041, inset -20px -20px 60px #ffffff40; */
            background-color: #fff;
            padding: 0 100px;
        }

        .add_ev * {
            font-family: 'Poppins', sans-serif;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }

        form h3 {
            font-size: 32px;
            font-weight: 500;
            line-height: 42px;
            text-align: center;
            color: #929aa8z;
        }

        label {
            display: block;
            margin-top: 30px;
            font-size: 16px;
            font-weight: 500;
            color: #929aa8;
        }

        .evd {
            display: block;
            height: 50px;
            width: 100%;
            background-color: #f6f9ff;
            box-shadow: 16px 15px 18px #00000041, inset 5px 7px 10px #00000040;
            border-radius: 10px;
            padding: 0 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
        }

        .evd1 {
            display: block;
            height: 70px;
            width: 100%;
            background-color: #f6f9ff;
            box-shadow: 16px 15px 18px #00000041, inset 5px 7px 10px #00000040;
            border-radius: 40px;
            padding: 11px 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
        }

        .evd1::-webkit-file-upload-button {
            background: #f6f9ff;
            color: #929aa8;
            border-radius: 50px;
            border: none;
            height: 50px;
            width: 100px;
            box-shadow: inset 2px 2px 7px 4px #00000040;
            20px 20px 60px #00000041,
            inset 2px -3px 10px 3px #00000040
        }

        ::placeholder,
        #stat {
            color: #929aa8;
        }

        .ev_btn {
            margin-top: 50px;
            width: 25%;
            background-color: #f6f9ff;
            box-shadow: 16px 15px 18px #00000041, 5px 7px 10px #00000040;
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 40px;
            cursor: pointer;
        }

        .bsc {
            margin-left: 30%;
        }

        .card-body {
            padding-bottom: 50px;
        }

        .title {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>

<body>
    <!-- ======= Header ======= -->
    <?php @include ("header.php"); ?>
    <!-- End Header -->

    <!-- End Page Title  -->

    <section class="section dashboard">
        <!-- New Booking -->
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <div class="title">
                        <h5 class="card-title">Take Action</h5>
                        <a href="book.php" class="btn btn-outline-danger">Back</a>
                    </div>

                    <div class="add_ev">
                        <form method="post">
                            <label>Remark</label>
                            <input class="evd" type="text" name="remark" placeholder="Enter Event Name">

                            <div class="bsc">
                                <button type="submit" name="add" class="ev_btn">Submit</button>
                                <button type="submit" name="cal" class="ev_btn">Cancel</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- End New Booking -->
    </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php @include ("footer.php"); ?>
    <!-- End Footer -->

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

<?php
if (isset($_POST['add'])) {
    $remark = $_POST['remark'];

    if (isset($_GET['editid'])) {
        $editid = $_GET['editid'];
        // Your existing code for handling $editid
        // ...

        $update = "update bookings set remark='$remark',status='Cancel' where id='$editid'";
        $exc1 = mysqli_query($cn, $update);
        if ($exc1) {
            // echo '<script>alert("updated successfuly")</script>';
            echo "<script>window.location.href ='book.php'</script>";
            // header("location:book.php");
            // echo "updated";
        } else {
            echo '<script>alert("failed updated try again later")</script>';
        }
    } else {
        // Handle the case where 'editid' is not set
        echo "editid is not set";
    }



    // $up = "UPDATE `bookings` SET `remark` = '$remark', `status` = '$status' WHERE `id`='$id'";

}
?>