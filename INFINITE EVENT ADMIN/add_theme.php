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


$cn = mysqli_connect("localhost", "root", "", "infinite_event");?>



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
            /* overflow-y: scroll; */
            /* height: 102%; */
            /* width: 100%; */
            background-color: #fff;
            /* position: absolute; */
            /* transform: translate(-50%, -50%); */
            /* border-radius: 6px; */
            /* backdrop-filter: blur(10px); */
            /* border: 2px solid rgba(255, 255, 255, 0.1); */
            /* box-shadow: 20px 20px 60px #00000041, inset -20px -20px 60px #ffffff40; */
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
            box-shadow: inset 2px 2px 7px 4px #00000040,
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

        .ev_btn:active {
            border: 5px solid #fff;
            box-shadow: 5px 5px 10px #00000041, inset 5px 5px 10px #00000040;
            /* transform: translateY(2px); */
        }

        .manage_btn{

            margin: 65px 0px 10px 30% ;
        }

        
       

        /* Center the image and position the close button */


        /* .close {
  

        tbody .hori img .setimg:hover {
            border-radius: 5px;
            max-width: 50%;
        }


        /* The Modal (background) */
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
            <h1>Event Details</h1>

        </div>
        <!-- End Page Title  -->
        <section class="section dashboard">
            <div class="row">


                <!-- New Booking -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <div class="card-title">
                                <h5>Add Theme</h5>
                                <a href="add_event1.php" type="button" class="btn btn-danger back_btn" data-toggle="model"
                                    data-target="#addsector">Back</a>
                            </div>
                            <div class="add_ev ">
                                <form method="post" enctype="multipart/form-data">
                                <input type="hidden" name="event_id" value='<?php echo $data['e_id']; ?>'>
                                <label>Image</label>
                                    <input class="evd1" type="file" name="s_img">

                                    <label>Theme Name</label>
                                    <input class="evd" type="text" name="s_name" placeholder="Enter Theme Name">

                                           

                                    <label>Description</label>
                                    <input class="evd" type="text" placeholder="Enter Description" name="des">

                                    <label>Short Description</label>
                                    <input class="evd" type="text" placeholder="Enter Short Description" name="sdes">
                                    
                                    <label>Price</label>
                                    <input class="evd" type="text" placeholder="Enter Theme Price" name="t_price">

                                 <?php 
                                 //events fetch from evnets table
                                    $query="select * from events";
                                    $result=mysqli_query($cn,$query);
                                 ?>
                                 <label>Choose Event Name</label>
                                 <div>
                            
                                    <select  name="event" class="evd">
                                    <?php while($data=mysqli_fetch_assoc($result)){
                                                ?>
                                        <option value="<?php echo $data['e_id']; ?>"><?php echo $data['e_name']; ?></option>
                                        <?php } ?>
                                        </div>
                                        </select>
                                    <!-- <label>Image</label>
        <input class="evd1" type="file" id="eventImage" name="eventImage" accept="image/*"> -->

                                    <div class="manage_btn">
                                        <button name="add" class="ev_btn" type="submit">Add Theme</button>
                                        <button type="reset" class="ev_btn">Clear</button>
                                    </div>
                                    <div>
                                    
                                   
                                    
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
<?php

if (isset($_POST['add'])) {
    // Retrieve event ID from the hidden input field
    $event_id = $_POST['event_id'];

    $file_name = $_FILES['s_img']['name'];
    $tmpname = $_FILES['s_img']['tmp_name'];

    $folder = "assets/img/" . $file_name;

    $name = $_POST['s_name'];
    $event = $_POST['event'];
    $ds = $_POST['des'];
    $tprice = $_POST['t_price'];
    $sds = $_POST['sdes'];
   
    // Include event ID in the INSERT query
    // $ins="insert into themes values(theme_id,$event,'$file_name','$name','$ds','$sds',t_price)";
    $ins = "INSERT INTO `themes`(`theme_id`,`event_id`, `image`, `name`, `des`, `sded`,`t_price`) VALUES (theme_id,'$event','$file_name','$name','$ds','$sds','$tprice')";
    $exc = mysqli_query($cn, $ins);
    
    if ($exc) {
        echo "<script>window.location.href ='add_event1.php'</script>";
    } else {
        echo '<script>alert("Failed to insert theme. Please try again later.")</script>';
    }
}

} ?>