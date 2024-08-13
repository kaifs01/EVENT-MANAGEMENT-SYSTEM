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


if (isset($_POST['add'])) {

    $uname = $_POST['userName'];
    $fname = $_POST['FirstName'];
    $lname = $_POST['LastName'];
    $mno = $_POST['MobileNumber'];
    $email = $_POST['Email'];
    $psw = $_POST['Password'];

    $insert="INSERT INTO `tbladmin`(`fname`, `lname`, `uname`, `phone`, `email`, `profile`, `password`) VALUES ('$aname','$uname','$fname','$lname','$mno','$email','$psw')";
    
    // $insert = "INSERT INTO  (`u_name`, `m_no`, `email`, `cr_date`) VALUES ('$name','$no','$email','$c_date')";

    $exc = mysqli_query($cn, $insert);
}




if (isset($_GET['del'])) {
    $del = "DELETE FROM `tbladmin` WHERE id=$_GET[del]";
    $result = $cn->query($del);
    header("location:manage_user.php");
}

if (isset($_POST['clear'])) {
    header("location:manage_user.php");
}


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



    <link href="manage_services.css" rel="stylesheet">
    <link rel="stylesheet" href="assets\css\style.css">

    <style>
        .btn_add {
            justify-content: end;

        }

        .filter {
            justify-content: end;
        }


        /* ------------form style----------- */


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
            /* overflow-y: scroll; */
            height: 102%;
            width: 100%;
            background-color: #f6f9ff;
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            border-radius: 6px;
            /* backdrop-filter: blur(10px); */
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 20px 20px 60px #00000041, inset -20px -20px 60px #ffffff40;
            padding: 80px 100px;
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
            color: 929aa8z;
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

        .evd:focus {
            border: 5px solid #f6f9ff;
            box-shadow: 5px 5px 10px #00000041, inset 5px 5px 10px #00000040;
        }

        .evd1:active {
            border: 5px solid #f6f9ff;
            box-shadow: 5px 5px 10px #00000041, inset 5px 5px 10px #00000040;
        }

        .evd1 {
            display: block;
            height: 50px;
            width: 100%;
            background-color: #f6f9ff;
            box-shadow: 16px 15px 18px #00000041, inset 5px 7px 10px #00000040;
            border-radius: 10px;
            padding: 11px 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
        }

        .evd1::-webkit-file-upload-button {
            background: #f6f9ff;
            color: #929aa8;
            border-radius: 10px;
            margin: 0;
            padding: 0;
            border: none;
            height: 33px;
            width: 100px;
            box-shadow: inset 2px 2px 7px 4px #00000040,
                20px 20px 60px #00000041,
                inset 2px -3px 10px 3px #00000040

        }



        ::placeholder {
            color: #929aa8;
            margin-left: 50px;

        }

        .ev_btn {

            width: 45%;
            background-color: #0d6efd;
            box-shadow: 0px 5px 10px #00000041, 5px 7px 10px #00000040;
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 10px;
            cursor: pointer;
            /* border: 8px solid #e1e6f1; */



        }

        .ev_btn:active {
            border: 5px solid #0d6efd;
            box-shadow: 5px 5px 10px #00000041, inset 5px 5px 10px #00000040;
            /* transform: translateY(2px); */
        }

        .dashboard .recent-sales img:hover {
            border-radius: 5px;
            max-width: 100%;
        }


        .dashboard .recent-sales img {
            border-radius: 5px;
            max-width: 100px;
        }

        .dashboard .recent-sales .table tbody td {
            vertical-align: middle;
        }

        .add_btn {
            margin-left: 0%;
            width: 47%;
            margin-right: 5px;
            box-shadow: 0px 6px 10px #00000041, inset 0px 5px 10px #00000040;
            border-radius: 10px;
        }

        .add_btn:active {
            border: 5px solid #0d6efd;
            box-shadow: 5px 5px 10px #00000041, inset 5px 5px 10px #00000040;
        }

        .btn2 {
            margin-left: 71%;

        }

        .manage_btn {
            width: 40%;
         
            margin: -6px 0px 0px 58%;
            display: flex;


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

    <!-- /*--------------------------------------------------------------
  # demo chack
  --------------------------------------------------------------*/ -->

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>User Detaile</h1>
        </div>
        <!-- End Page Title  -->
        <section class="section dashboard">
            <div class="row">
                <!-- New Booking -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <div class="card-title">
                                <h5>Users</h5>
                                <div class="manage_btn">
                                    <a href="register_user.php" class="btn btn-primary add_btn">Register</a>
                                    <a href="user_block.php" class="btn btn-primary add_btn">blocked users</a>
                                </div>
                            </div>
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Mobile Number</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Date registered</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $select = "SELECT * FROM `tbladmin`";
                                    $result = $cn->query($select);
                                    while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                       <tr>
                                           <td>
                                               <?php echo $row['id']; ?>
                                           </td>
                                           <td class="font-w600">
                                               <?php echo $row['fname']; ?>&nbsp;<?php echo $row['lname']; ?>
                                           </td>
                                           <td>
                                               0<?php echo $row['phone']; ?>
                                           </td>
                                           <td>
                                               <?php echo $row['email']; ?>
                                           </td>
                                           <td>
                                               <?php echo $row['reg_date']; ?>
                                           </td>
                                           <td>
                                               <a href="user_update.php?edit=<?PHP echo $row['id']; ?>"
                                                   class="btn btn-outline-warning btn-sm editbtn" title="click for edit"><i
                                                       class="bx bx-edit" aria-hidden="true"></i></a>

                                               <a href="manage_user.php?del=<?PHP echo $row['id']; ?>"
                                                   onclick="return confirm('ARE YOU SURE TO DELETE?');"
                                                   class="btn btn-outline-danger btn-sm"><i class="bx bx-block"></i></a>
                                           </td>
                                        </tr>

                            </div>
                            <?php
                                    }
                                    ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>
    <!-- New Booking End -->


    <!-- /*--------------------------------------------------------------
  # demo chack end
  --------------------------------------------------------------*/ -->
    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Infinite Impress</span></strong>. All Rights Reserved
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    <!-- Vendor JS Files -->
    <script
        src="c:\xampp\htdocs\project\Royal Event\royal_event\assets\vendor\bootstrap\js\bootstrap.min.js.map"></script>
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