<?php

$cn = mysqli_connect("localhost", "root", "", "infinite_event");


if (isset($_POST['add'])) {
 
  
  $name = $_POST['e_name'];      
  $sd = $_POST['short_desc'];
  $ds = $_POST['disc'];
  $c_date = $_POST['cr_date'];
  $price = $_POST['price'];
  
  $file_name = $_FILES['ev_img']['name'];
  $tmpname = $_FILES['ev_img']['tmp_name'];

  $folder = "assets/img/" . $file_name;

  $insert = "INSERT INTO ev_details (e_name, short_desc, disc, cr_date, price, ev_img) VALUES ('$name','$sd','$ds','$date','$price','$file_name')";

  $exc = mysqli_query($cn, $insert);
}

  if (isset($_GET['del'])) {
  $del = "DELETE FROM `ev_details` WHERE id=$_GET[del]";
  $result = $cn->query($del);
  header("location:index1.php");
}

if (isset($_POST['clear'])) {
  header("location:index1.php");
}















// if (isset($_POST['add'])) {

//   $e_name = $_POST['e_name'];      
//   $s_disc = $_POST['short_dis'];
//   $disc = $_POST['disc'];
//   $c_date = $_POST['cr_date'];
//   $price = $_POST['price'];


// $filename = $_FILES['img']['name'];
// $tmp_name = $_FILES['img']['tmp_name'];
  

//   $folder = "assets/img/" . $filename;



  
  // $insert = "INSERT INTO `ev_detaile`(`e_name`, `short_dis`, `disc`, `cr_date`, `price`, `img`) VALUES('$e_name','$s_disc','$disc','$c_date','$price','$filename')";

  // $result = $cn->query($insert)
  // $result =mysqli_query($cn,$insert);

// }

// if (isset($_POST['btnupdate'])) {

//   $e_name = $_POST['e_name'];
//   $s_disc = $_POST['short_dis'];
//   $disc = $_POST['disc'];
//   $c_date = $_POST['cr_date'];
//   $price = $_POST['price'];


//   $filename = $_FILES["img"]["name"];
//   $tmp_name = $_FILES["img"]["tmp_name"];

//   $folder = "../assets/img/" . $filename;



//   $update = "UPDATE `ev_detaile` SET `e_name`='$e_name',`short_dis`='$s_disc',`disc`='$disc',`cr_date`='$c_date',`price`='$price',`img`='$filename' WHERE id=$_GET[edit]";

//   $result = $cn->query($update);

//   if ($result) {
//       header("location:index1.php");
//   }
// }

// if (isset($_GET['edit'])) {
//   $sel = "select * from ev_detaile where id=$_GET[edit]";
//   $result = $cn->query($sel);
//   $row = mysqli_fetch_array($result);
// }

// if (isset($_GET['del'])) {
//   $del = "DELETE FROM `ev_detaile` WHERE id=$_GET[del]";
//   $result = $cn->query($del);
//   header("location:index1.php");
// }

// if (isset($_POST['clear'])) {
//   header("location:index1.php");
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

  <link href="assets/css/maincss/manage_event.css" rel="stylesheet">

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
      border-radius: 10px;
      /* backdrop-filter: blur(10px); */
      border: 2px solid rgba(255, 255, 255, 0.1);
      box-shadow: 20px 20px 60px #00000041, inset -20px -20px 60px #ffffff40;
      padding: 50px 35px;
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
      margin-top: 50px;
      margin: 50px 0px 10px 10px;
      width: 45%;
      background-color: #f6f9ff;
      box-shadow: 0px 5px 10px #00000041, 5px 7px 10px #00000040;
      color: #080710;
      padding: 15px 0;
      font-size: 18px;
      font-weight: 600;
      border-radius: 40px;
      cursor: pointer;
      /* border: 8px solid #e1e6f1; */


      
    }




    .ev_btn:active {
      border: 5px solid #f6f9ff;
      box-shadow: 5px 5px 10px #00000041, inset 5px 5px 10px #00000040;
      /* transform: translateY(2px); */
    }


    /* Center the image and position the close button */


    /* .close {
  position: fixed;
  right: 10px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}
*/

    ::-webkit-scrollbar {
      width: 0px;
    }



    /* Add Zoom Animation */
    /* .animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
} */

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
      <h1>Event Detailse</h1>

    </div>
    <!-- End Page Title  -->
    <section class="section dashboard">
      <div class="row">
        <div class="col-12">
          <div class="card recent-sales overflow-auto" style="height: 100%;">
            <div class="card-body">


              <div class="add_ev ">
                <form action="index1.php" method="post" enctype="multipart/form-data">

                  <?PHP if (isset($_GET['edit'])) { ?>
                    <h3>Update Event</h3>
                  <?PHP } else { ?>
                    <h3>Add New Event</h3>
                  <?PHP } ?>

                  <div class="row mb-3">
                    <div class="col-md-6">
                      <label>Event Name</label>
                      <input class="evd" type="text" name="e_name" placeholder="Enter Event Name">
                    </div>
                    <div class="col-md-6">
                      <label>Short Description</label>
                      <input class="evd" type="text" placeholder="Enter Short Description" name="short_desc">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-md-6">
                      <label>Description</label>
                      <input class="evd" type="text" placeholder="Enter Description" name="disc">
                    </div>
                    <div class="col-md-6">
                      <label>Creation Date</label>
                      <input class="evd" type="date" placeholder="Enter " name="cr_date">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-md-6">
                      <label>Price</label>
                      <input class="evd" type="text" placeholder="Enter Event" name="price">
                    </div>
                    <div class="col-md-6">
                      <label>Image</label>
                      <input class="evd1" type="file" name="ev_img">
                    </div>
                  </div>
                  <div style="width: 30%; margin-left: 35%;">
                    <?PHP if (isset($_GET['edit'])) { ?>
                      <button name="add" class="ev_btn" type="submit">Update</button>
                      <button type="submit" class="ev_btn" name="clear">CANCEL</button>
                    <?PHP } else { ?>
                      <button name="add" class="ev_btn" type="submit">Add Event</button>
                      <button type="reset" class="ev_btn">Clear</button>
                    <?PHP } ?>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- New Booking -->
          <div class="col-12">

            <div class="card recent-sales overflow-auto">
              <div class="card-body">
                <div class="card-title">

                  <h5>New Bookings</h5>
                   <?PHP
                   require_once'conn.php';
                   if (isset($_GET['edit'])) { ?>
                <a href="#" onclick="document.getElementById('id01').style.display='block'" type="button" class="btn btn-success" data-toggle="model" data-target="#addsector">Update</a>
                <?PHP } else { ?>
                <a href="#" onclick="document.getElementById('id01').style.display='block'" type="button" class="btn btn-success" data-toggle="model" data-target="#addsector">Add Events</a>
                <?PHP } ?> 
                </div>



                 <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">image</th>
                      <th scope="col">Event Name</th>
                      <th scope="col">Description</th>
                      <th scope="col">short Description</th>
                      <th scope="col">Date Of Creation</th>
                    </tr>
                  </thead>

                  <tbody class="hori">
                    <?php
                    $select = "SELECT * FROM `event_e`";
                    $result = $cn->query($select);
                    while ($row = mysqli_fetch_array($result)) {
                      ?>
                      <tr>
                        <td>
                          <?php echo $row['id']; ?>
                        </td>
                        <td>
                          <img class="setimg" src="assets/img/<?php echo $row['image']; ?>" alt="images" class="setimg" height="100px" style="    width: 40%;"> 
                        </td>
                        <td class="font-w600">
                          <span class="badge bg-info">
                            <?php echo $row['name']; ?>
                          </span>
                        </td>


                        <td>
                          <?php echo $row['description']; ?>
                        </td>
                        <td>
                          <?php echo $row['sdescription']; ?>
                        </td>
                        
                        <td>

                          <a href="index1.php?del=<?PHP echo $row['id']; ?>"
                            onclick="return confirm('ARE YOU SURE TO DELETE?');" class="btn btn-outline-danger btn-sm"><i
                              class="bx bx-trash"></i></a>
                        </td>
                      </tr>
                      <?php
                    }
                    ?>


                  </tbody>
                </table>

                <!-- <table class="table table-borderless">
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
                      $select = "SELECT * FROM ev_detaile";
                      $result = mysqli_query($cn, $select);
                      while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                        <tr>
                          <td><a href="#" class="text-primary fw-bold">
                            <?php echo $row['e_name'] ?>
                          </a></td>
                          <td>
                            <?php echo $row['cr_date'] ?>
                          </td>
                          <td>
                            <?php echo $row['price'] ?>
                          </td>
                          <td><a href="#"><img src="assets/img/<?php echo $row['Preview'] ?>"></a></td>
                          <td>
                            <button type="submit" class="btn btn-sm btn-outline-warning"><i class="bx bx-edit"></i></button>
                            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bx bxs-trash"></i></button>
                          </td>
                        </tr>

                      <?php
                      }
                      ?>
                    </tbody>
                  </table> -->

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
  <!-- <script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


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