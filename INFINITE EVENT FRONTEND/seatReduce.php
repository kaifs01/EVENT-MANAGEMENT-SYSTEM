<?php


include ("db/cn.php");

session_start();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Event details</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/edited.css" rel="stylesheet">
</head>

<body>
    <?php
    @include 'header.php';
    ?>

    <!-- Search Start -->
    <!-- <div class="container-fluid bg-primary my-5 py-5">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-white text-uppercase border-bottom border-5">Find A Doctor</h5>
                <h1 class="display-4 mb-4">Find A Healthcare Professionals</h1>
                <h5 class="text-white fw-normal">These doctors often have extensive education and experience in fields such as psychiatry or psychology, and they are dedicated to helping people improve their mental well-being and overall quality of life.</h5>
            </div>
        </div>    <div class="mx-auto" style="width: 100%; max-width: 600px;">
                <div class="input-group">
                    <input type="text" name="find" class="form-control border-primary w-50" placeholder="Find Docters">
                    <button name="search" class="btn btn-dark border-0 w-25">Search</button>
                </div>
            </div>
       
    </div> -->


    <div class="container mt-4">
        <div class="card" style="background-color: #ee8425 ;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">

                    <h1 class="display-3 card-title mx-5 text-font-2 text-white">Themes</h1>
                    <div class="input-group mx-5" style="width: 300px;">
                        <form method="POST">
                            <input type="text" name="find" class="form-control text-font mb-3" style="float: left; width: 90%;" aria-label="Search animals">
                            <button class="btn btn-secondary" name="search" style="float: center; width: 25%;"><span class="fa fa-magnifying-glass">Search</span></button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search End -->


    <!-- Team Start -->
    <?php
    @require_once 'db/cn.php';
    if (isset($_POST['search'])) {
        $find = $_POST['find'];
        $select = "SELECT * FROM `themes` WHERE name LIKE '%$find%'";
        $result = $cn->query($select);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
    ?>          
                <div class="container mt-3">
                    <div class="card">
                        <div class="row no-gutters">
                            <div class="col-md-4">

                                <img src="extra work/NiceAdmin/assets/img/<?php echo $row['image'] ?>" class="img-thumbnail m-3" alt="event Image"  style="    height: -webkit-fill-available;">

                            </div>
                            <div class="col-md-8">
                                <div class="card-body m-3">
                                    <h1 class="color-1 text-font-2">
                                        <?php echo $row['name']; ?>
                                    </h1>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul class="list-unstyled mt-4">

                                                <li><strong class="color-1 text-font fw-bold">Description :</strong>
                                                    <?php echo $row['des']; ?>
                                                </li>
                                           
<!-- 
                                                <li><strong class="color-1 text-font fw-bold">Short Description :</strong>

                                                 <?php //echo $row['sded']; ?>
                                                </li> -->
                                                <li><strong class="color-1 text-font fw-bold"> Price :</strong>
                                                    Rs.<?php echo $row['t_price']; ?>/-
                                                </li>
                                                <li>
                                                    <a class="btn btn-lg btn-primary btn-lg-square rounded-btn w-50" href="book_event.php?event_id=<?php echo $row['event_id']; ?>&th_id=<?php echo $row['theme_id']; ?>">Book Now</a>
                                                <!-- <li><strong class="color-1 text-font fw-bold">Description :</strong>
                                                    <?php //echo $row['des']; ?>
                                                </li>
                                                <li><strong class="color-1 text-font fw-bold">Short Description :</strong>
                                                    <?php // echo $row['sdes']; ?>
                                                </li> -->
                                                <!-- <li>
                                                    <button class="btn btn-dark border-0 my-2 w-100"><a href="theme.php?event_id=$row['event_id';">view theme</a>
                                                    </button>
                                                    <a href='view_theme.php?event_id={$row->event_id}' class='btnn'>View Theme</a>

                                                </li> -->
                                            </ul>
                                        </div>
                                        <!-- <div class="col-md-6">
                                       <p class="card-text mt-3">
                                           
                                       </p>
                                   </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo '<div class="container mt-4">
        <div class="card text-center bg-warning">
            <div class="card-body">
                <h1 class="card-title text-font-2 text-danger">No Event Found</h1>
            </div>
        </div>
    </div>
    ';
        }
    } else {
      
    //  $cn = mysqli_connect("localhost", "root", "", "infinite_event");
     // Check if event ID is provided in the URL
     if (isset($_GET['event_id'])) {
        
        $event_id = $_GET['event_id'];

        // Fetch event details
        // $event_query = "SELECT * FROM events WHERE e_id = $event_id";
        $event_query = "SELECT * FROM events";
        $event_result = mysqli_query($cn, $event_query);
        $event_row = mysqli_fetch_assoc($event_result);

        $theme_query = "SELECT * FROM themes";
        $theme_result = mysqli_query($cn, $theme_query);
        if (mysqli_num_rows($theme_result) > 0) {
        while ($row = mysqli_fetch_array($theme_result)) {
                ?>
                <div class="container mt-3">
                    <div class="card">
                        <div class="row no-gutters">
                            <div class="col-md-4">

                                <img src="extra work/NiceAdmin/assets/img/<?php echo $row['image'] ?>" class="img-thumbnail m-3" alt="event Image"  style="height: -webkit-fill-available;">

                            </div>
                            <div class="col-md-8">
                                <div class="card-body m-3">
                                    <h1 class="color-1 text-font-2">
                                        <?php echo $row['name']; ?>
                                    </h1>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul class="list-unstyled mt-4">

                                                <li><strong class="color-1 text-font fw-bold">Description :</strong>
                                                    <?php echo $row['des']; ?>
                                                </li>
                                           

                                                <!-- <li><strong class="color-1 text-font fw-bold">Short Description :</strong>

                                                    <?php // echo $row['sded']; ?>
                                                </li> -->
                                                <li><strong class="color-1 text-font fw-bold"> Price :</strong>
                                                    Rs.<?php echo $row['t_price']; ?>/-
                                                </li>
                                                <li>
                                                    <a class="btn btn-lg btn-primary btn-lg-square rounded-btn w-50" href="book_event.php?event_id=<?php echo $row['event_id']; ?>&th_id=<?php echo $row['theme_id']; ?>">Book Now</a>
                                                <!-- <li><strong class="color-1 text-font fw-bold">Description :</strong>
                                                    <?php //echo $row['des']; ?>
                                                </li>
                                                <li><strong class="color-1 text-font fw-bold">Short Description :</strong>
                                                    <?php // echo $row['sdes']; ?>
                                                </li> -->
                                                <!-- <li>
                                                    <button class="btn btn-dark border-0 my-2 w-100"><a href="theme.php?event_id=$row['event_id';">view theme</a>
                                                    </button>
                                                    <a href='view_theme.php?event_id={$row->event_id}' class='btnn'>View Theme</a>

                                                </li> -->
                                            </ul>
                                        </div>
                                        <!-- <div class="col-md-6">
                                       <p class="card-text mt-3">
                                           
                                       </p>
                                   </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
        }
        }
    }

  }  ?>

        <br>
        <br>

        <!-- Team End -->



        <?php
        @include "footer.php";
        ?>



        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/tempusdominus/js/moment.min.js"></script>
        <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
        <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
        <script src="js/login.js"></script>
</body>

</html>
