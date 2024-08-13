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

// Assuming you have a session variable named $_SESSION['profile_image'] to store the profile image filename

$profile_image = isset($_SESSION['profile']) ? $_SESSION['profile'] : '';


if (isset ($_POST['update'])) {

    $s_name = $_POST['s_name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $c_date = $_POST['cr_date'];

    $file_name = $_FILES['s_img']['name'];
    $tmpname = $_FILES['s_img']['tmp_name'];

    $folder = "assets/img/" . $file_name;



    $update = "UPDATE `ev_services` SET `s_name`='$s_name',`desc`='$desc',`price`='$price',`cr_date`='$c_date',`s_img`='$file_name' WHERE id=$_GET[edit]";

    $result = $cn->query($update);

    if ($result) {
        header('location:manage_services.php');
    }

}

if (isset ($_GET['edit'])) {
    $sel = "SELECT * FROM `ev_services` WHERE id=$_GET[edit]";
    $result = $cn->query($sel);
    $row = mysqli_fetch_array($result);
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

    <!-- Template Main CSS File -->

    <link href="manage_services.css" rel="stylesheet">

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
            background-color: #fff;
            padding: 0px 100px;
        }

        .add_ev * {
            font-family: 'Poppins', sans-serif;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
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
            background-color: #fff;
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
            background-color: #fff;
            box-shadow: 16px 15px 18px #00000041, inset 5px 7px 10px #00000040;
            border-radius: 10px;
            padding: 11px 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
        }

        .evd1::-webkit-file-upload-button {
            background: #fff;
            color: #929aa8;
            border-radius: 10px;
            margin: 0;
            padding: 0;
            border: none;
            height: 33px;
            width: 100px;
            box-shadow: inset 2px 2px 7px 4px #00000040;
            20px 20px 60px #00000041,
            inset 2px -3px 10px 3px #00000040
        }



        ::placeholder {
            color: #929aa8;
            margin-left: 50px;

        }

        .ev_btn {
            width: 25%;
            background-color: #fff;
            box-shadow: 0px 5px 10px #00000041, 5px 7px 10px #00000040;
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 40px;
            cursor: pointer;
            /* border: 8px solid #e1e6f1; */



        }



        .ev_btn:hover {

            /* box-shadow: inset 16px 15px 18px #00000041, inset 5px 7px 10px #00000040 ; */
            /* background-color: #3e8e41 */
            /* border: 5px solid #f6f9ff;
  box-shadow:  0px 5px 10px #00000041, inset 5px 5px 10px #00000040 ; */
        }

        .ev_btn:active {
            border: 5px solid #fff;
            box-shadow: 5px 5px 10px #00000041, inset 5px 5px 10px #00000040;
            /* transform: translateY(2px); */
        }

        .manage_btn {

            margin: 65px 0px 10px 30%;
        }

        .back_btn {
            margin-left: 75%;
            width: 10%;
            background-color: #dc3545;
            box-shadow: 0px 5px 10px #00000041, 5px 7px 10px #00000040;
            color: #080710;
            padding: 5px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }


        tbody .hori img .setimg:hover {
            border-radius: 5px;
            max-width: 50%;
        }


        /* The Modal (background) */
    </style>

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Aug 30 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>



<style>
    /* body {font-family: Arial, Helvetica, sans-serif;} */

    /* Full-width input fields */



    .filter {
        justify-content: end;

    }


    button .btn_add {

        top: 50px;
        left: 50px;

    }
</style>

<body>

<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
    <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logoin1.png" alt="">
        <span class="d-none d-lg-block" style="text-decoration: none;">Infinite Impress</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<div class="search-bar">
    <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
    </form>
</div><!-- End Search Bar -->

<nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
            <a class="nav-link nav-icon search-bar-toggle " href="#">
                <i class="bi bi-search"></i>
            </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                <i class="bi bi-bell"></i>
                <span class="badge bg-primary badge-number">4
                </span>
            </a><!-- End Notification Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                <li class="dropdown-header">
                    You have 4 new notifications
                    <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li class="notification-item">
                    <i class="bi bi-exclamation-circle text-warning"></i>
                    <div>
                        <h4>Lorem Ipsum</h4>
                        <p>Quae dolorem earum veritatis oditseno</p>
                        <p>30 min. ago</p>
                    </div>
                </li>

                <li>
                    <hr class="dropdown-divider">
                </li>

                <li class="notification-item">
                    <i class="bi bi-x-circle text-danger"></i>
                    <div>
                        <h4>Atque rerum nesciunt</h4>
                        <p>Quae dolorem earum veritatis oditseno</p>
                        <p>1 hr. ago</p>
                    </div>
                </li>

                <li>
                    <hr class="dropdown-divider">
                </li>

                <li class="notification-item">
                    <i class="bi bi-check-circle text-success"></i>
                    <div>
                        <h4>Sit rerum fuga</h4>
                        <p>Quae dolorem earum veritatis oditseno</p>
                        <p>2 hrs. ago</p>
                    </div>
                </li>

                <li>
                    <hr class="dropdown-divider">
                </li>

                <li class="notification-item">
                    <i class="bi bi-info-circle text-primary"></i>
                    <div>
                        <h4>Dicta reprehenderit</h4>
                        <p>Quae dolorem earum veritatis oditseno</p>
                        <p>4 hrs. ago</p>
                    </div>
                </li>

                <li>
                    <hr class="dropdown-divider">
                </li>
                <li class="dropdown-footer">
                    <a href="#">Show all notifications</a>
                </li>

            </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                <i class="bi bi-chat-left-text"></i>
                <span class="badge bg-success badge-number">3</span>
            </a><!-- End Messages Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                <li class="dropdown-header">
                    You have 3 new messages
                    <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li class="message-item">
                    <a href="#">
                        <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                        <div>
                            <h4>Maria Hudson</h4>
                            <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                            <p>4 hrs. ago</p>
                        </div>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li class="message-item">
                    <a href="#">
                        <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                        <div>
                            <h4>Anna Nelson</h4>
                            <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                            <p>6 hrs. ago</p>
                        </div>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li class="message-item">
                    <a href="#">
                        <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                        <div>
                            <h4>David Muldon</h4>
                            <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                            <p>8 hrs. ago</p>
                        </div>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li class="dropdown-footer">
                    <a href="#">Show all messages</a>
                </li>

            </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="assets/img/<?php echo $profile_image; ?>" alt="Profile" class="rounded-circle">
      </a><!-- End Profile Image Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li class="dropdown-header">
                    <h6>kazi kaif</h6>
                    <span>Event Planner</span>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                        <i class="bi bi-person"></i>
                        <span>My Profile</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                        <i class="bi bi-gear"></i>
                        <span>Account Settings</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                        <i class="bi bi-question-circle"></i>
                        <span>Need Help?</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                    </a>
                </li>

            </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

    </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->

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
            <a href="Components-badges.html" class="unline">
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
    <!-- End Sidebar-->

    <!-- /*--------------------------------------------------------------
  # demo chack
  --------------------------------------------------------------*/ -->

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Service Detailse</h1>

        </div>
        <!-- End Page Title  -->
        <section class="section dashboard">
            <div class="row">


                <!-- New Booking -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <div class="card-title">
                                <h5>Update Services</h5>
                                <a href="manage_services.php" type="button" class="btn btn-danger back_btn"
                                    data-toggle="model" data-target="#addsector">Back</a>
                            </div>
                            <div class="add_ev ">

                                <form action="" method="post" enctype="multipart/form-data">

                                    <label>Service Name</label>
                                    <input class="evd" type="text" name="s_name" placeholder="Enter Service Name" value="<?PHP if (isset ($_GET['edit']))
                                        echo $row['s_name']; ?>">

                                    <label>Price</label>
                                    <input class="evd" type="text" placeholder="Enter Price" name="price" value="<?PHP if (isset ($_GET['edit']))
                                        echo $row['price']; ?>">

                                    <label>Description</label>
                                    <input class="evd" type="text" placeholder="Enter Description" name="desc" value="<?PHP if (isset ($_GET['edit']))
                                        echo $row['desc']; ?>">

                                    <label>Creation Date</label>
                                    <input class="evd" idtype="date" placeholder="Enter Creation Date" name="cr_date"
                                        value="<?PHP if (isset ($_GET['edit']))
                                            echo $row['cr_date']; ?>">

                                    <label>Image</label>
                                    <!-- Modify the img tag to include an id attribute -->
                                    <img id="previewImage" src="assets/img/<?php echo $row['s_img']; ?>"
                                        alt="Previous Image" style="max-width: 100px;">

                                    <input class="evd1" type="file" name="s_img" value="<?PHP if (isset ($_GET['edit']))
                                        echo $row['s_img']; ?>">

                                    <div class="manage_btn">
                                        <button name="update" class="ev_btn" type="submit">Update</button>
                                        <button type="submit" class="ev_btn" name="clear">CANCEL</button>
                                    </div>


                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- New Booking End -->



    <!-- Add JavaScript code -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Get the file input element
            var fileInput = document.querySelector('input[type="file"]');

            // Add event listener for the change event on the file input
            fileInput.addEventListener("change", function () {
                // Get the selected file
                var file = this.files[0];

                // Check if a file is selected
                if (file) {
                    // Create a FileReader object
                    var reader = new FileReader();

                    // Set up the FileReader onload function
                    reader.onload = function (e) {
                        // Get the img element
                        var img = document.getElementById('previewImage');

                        // Set the src attribute of the img element to the data URL of the selected file
                        img.src = e.target.result;
                    }

                    // Read the selected file as a Data URL
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>



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



    <script>
        function previewImage(input) {
            var file = input.files[0];
            var imageType = /image.*/;

            if (file && file.type.match(imageType)) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    var img = document.getElementById('imagePreview');
                    img.src = e.target.result;
                    img.style.display = 'block'; // Display the image preview
                }

                reader.readAsDataURL(file);
            }
        }
    </script>

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