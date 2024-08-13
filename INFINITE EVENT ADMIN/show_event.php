<?php
$cn = mysqli_connect("localhost", "root", "", "infinite_event");

// ========== Insert Record ==========

if (isset($_POST['add'])) {
  $file_name = $_FILES['ev_img']['name'];
  $tmpname = $_FILES['ev_img']['tmp_name'];

  $folder = "assets/img/" . $file_name;

  $name = $_POST['e_name'];
  $sd = $_POST['Short_desc'];
  $ds = $_POST['disc'];
  $date = $_POST['cr_date'];
  $price = $_POST['price'];

  $insert = "INSERT INTO `ev_details`(`e_name`, `Short_desc`, `disc`, `cr_date`, `price`, `ev_img`) VALUES ('$name','$sd','$ds','$date','$price','$file_name')";

  $exc = mysqli_query($cn, $insert);
}

// ========== Update Record ==========

if (isset($_POST['update'])) {
  $file_name = $_FILES['preview']['name'];
  $tmpname = $_FILES['preview']['tmp_name'];

  $folder = "assets/img/" . $file_name;

  $name = $_POST['ev_name'];
  $price = $_POST['price'];
  $book = $_POST['booking'];

  $update = "UPDATE `topevent` SET `preview`='$file_name',`ev_name`='$name',`price`='$price',`booking`='$book' WHERE `id`=$_GET[edit]";

  $exc = mysqli_query($cn, $update);

  if($exc){}
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
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title  -->
    <section class="section dashboard">
   
        <!-- Top Events -->
        <div class="col-12">
              <div class="card top-selling overflow-auto" style="height: 570px;">
                <div class="card-body pb-0">
                  <div class="modal-header" style="padding: 20px 0 15px 0;">
                    <h5 class="modal-title" style="float: left;font-weight: 500; color: #012970; 
                    font-family: 'Poppins', sans-serif;">Top Events</h5>
                    <div class="card-tool" style="float: right;">

                    <?php
                    if(isset($_GET['edit'])){
                    ?>
                    <button type="button" onclick="document.getElementById('id01').style.display='block'"
                        class="btn btn-success" data-bs-toggle="modal" data-bs-target="add_tev">Update Event</button>

                        <?php } else{?>
                      <button type="button" onclick="document.getElementById('id01').style.display='block'"
                        class="btn btn-success" data-bs-toggle="modal" data-bs-target="add_tev">Add
                        Top Events</button>

                        <?php }?>
                    </div>
                  </div>

                  <div class="modal" id="id01">
                    <?php @include "add_ev_form.php"; ?>
                  </div>


                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Event Name</th>
                        <th scope="col">Creation Date</th>
                        <th scope="col">Price</th>
                        <th scope="col">Preview</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      $select = "SELECT * FROM `ev_details`";
                      $result = mysqli_query($cn, $select);
                      while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                        <tr>
                            <td><a href="#" class="text-primary fw-bold">
                                <?php echo $row['e_name'] ?>
                            </a></td>
                            <td class="fw-bold">
                                <?php echo $row['cr_date'] ?>
                            </td>
                            <td>
                                <?php echo $row['price'] ?>
                            </td>
                            <td><a href="#"><img src="assets/img/<?php echo $row['ev_img'] ?>"></a></td>
                          <td>
                            <a href="#" class="btn btn-sm btn-outline-warning"><i class="bx bx-edit"></i></a>
                            <a href="#" class="btn btn-sm btn-outline-danger"><i class="bx bx-trash"></i></a>
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