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
if (isset($_GET['del'])) {
  $del = "DELETE FROM `events` WHERE e_id=$_GET[del]";
  $result = $cn->query($del);
  header("location:add_event1.php");
}

if (isset($_POST['clear'])) {
  header("location:add_event1.php");
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
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style_review.css">

  
     <style>
    .title {
            display: flex;
            justify-content: space-between;
            align-items: center;
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


<?php $cn = mysqli_connect("localhost", "root", "", "infinite_event");
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
<?php include("head_nav.php");?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php include("side_nav.php");?>
  <!-- End Sidebar-->
  
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Event Details</li>
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
                            <a href="add_event.php" class="btn btn-success">Add Event</a>
                        </div>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Event Name  </th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Short Description</th>
                                    <th scope="col">Creation Date</th>
                                    <th scope="col">price</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Theme</th>
                                </tr>
                            </thead>
                            <tbody>
                                  <?php
                                 
                                    $select = "SELECT * FROM `events`";
                                    $result = $cn->query($select);
                                    while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $row['e_id']; ?>
                                            </td>
                                            <td>
                                                <a href="#"><img src="assets/img/<?php echo $row['image']; ?>"
                                                        alt="images"></a>
                                            </td>
                                            <td class="font-w600">
                                                <?php echo $row['e_name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['des']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['sdes']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['created_at']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['price']; ?>
                                            </td>
                                           
                                            <td>
                                                <a href="edit_Event.php?edit=<?PHP echo $row['e_id']; ?>"
                                                    class="btn btn-outline-warning btn-sm editbtn" title="click for edit"><i
                                                        class="bx bx-edit" aria-hidden="true"></i></a>

                                                <a href="add_event1.php?del=<?PHP echo $row['e_id']; ?>"
                                                    onclick="return confirm('ARE YOU SURE TO DELETE?');"
                                                    class="btn btn-outline-danger btn-sm"><i class="bx bx-trash"></i></a>
                                            </td>
                                           
                                        <td>
                                        <a href="view_theme.php?add_theme=<?PHP echo $row['e_id']; ?>" class="btn btn-outline-info btn-sm" title="View Themes">
        <i class="bx bx-show"></i>
    </a>
    <a href="add_theme.php?event_id=<?php echo $row['e_id']; ?>" class="btn btn-outline-success btn-sm" title="Add Theme">
        <i class="bx bx-plus"></i> Add Theme
    </a>                          </td>

                                           
                                        </tr>
                                        <!-- <div class="modal" id="id02">-->
                            </div>
                            <?php
                                    }
                                    ?>
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