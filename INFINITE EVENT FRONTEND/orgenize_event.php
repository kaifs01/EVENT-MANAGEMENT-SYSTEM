<?php

$cn=mysqli_connect("localhost","root","","infinite_event");

session_start();

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("location:login.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Mental Health Care Website</title>
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
    <!-- Topbar Start -->
    <div class="container-fluid py-2 border-bottom d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-decoration-none text-body pe-3" href=""><i class="bi bi-telephone me-2"></i>+958 638 5889</a>
                        <span class="text-body">|</span>
                        <a class="text-decoration-none text-body px-3" href=""><i class="bi bi-envelope me-2"></i>mentalinfo@.com</a>
                    </div>
                </div>
                <div class="col-md-6 text-center text-lg-end">
                    <div class="d-inline-flex align-items-center">
                        <a class="text-body px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-body px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-body px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-body px-2" href="">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="text-body ps-2" href="">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid sticky-top bg-white shadow-sm">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
            <a href="home.php" class="navbar-brand">
    <img src="img/logo2.png" alt="Logo" class="logo-image"> </a><!-- Add your logo image here -->
    <h1 class="event_name">Infinite Event</h1>
</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="home.php" class="nav-item nav-link">Home</a>
                        <a href="service.php" class="nav-item nav-link">Services</a>
                        <a href="therapy.html" class="nav-item nav-link">Therapy</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle active " data-bs-toggle="dropdown">Appointmenet</a>
                            <div class="dropdown-menu m-0">
                                <a href="appointment.php" class="dropdown-item">Appointment</a>
                            </div>
                        </div>
                        <a href="about.html" class="nav-item nav-link">About</a>
                        <a href="contact.php" class="nav-item nav-link">Contact</a>

                            <a href="index.php" class="nav-item nav-link">
                                <button class="btn  my-2 my-sm-0 ">
                              <i class="fa fa-user " aria-hidden="true"></i>
                              <span>
                                Logout
                              </span>
                            </button>
                            </a>
                            <!-- <a href="login-08.html#" data-panel=".panel-signup" class="nav-item nav-link">
                                <button class="btn  my-2 my-sm-0 ">
                              <i class="fa fa-user" aria-hidden="true"></i>
                              <span>
                                Sign Up
                              </span>
                              </button>
                            </a>-->
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </a>
                                <div class="dropdown-menu mb-2">
                                    <input class="form-control dropdown-item w-100 " type="search" placeholder="Search" aria-label="Search">
                                    <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
                                    <button class="btn btn-dark border-0 my-2 w-100">Search</button>
                                </div>
                            </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>    <!-- Navbar End -->

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
                    <h1 class="display-3 card-title mx-5 text-font-2 text-white">Event</h1>
                    <div class="input-group mx-5" style="width: 300px;">
                        <form method="POST">
                            <input type="text" name="find" class="form-control text-font mb-3"
                                style="float: left; width: 90%;" aria-label="Search animals">
                            <button class="btn btn-secondary" name="search" style="float: center; width: 25%;"><span 
                                    class="fa fa-magnifying-glass">Search</span></button>
                                    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search End -->


    <!-- Team Start -->
    <?php

if (isset($_POST['search'])) {
    $find = $_POST['find'];
    $select = "SELECT * FROM `events` WHERE e_name LIKE '%$find%'";
    $result = $cn->query($select);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="container mt-3">
                <div class="card">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="extra work/NiceAdmin/assets/img/<?php echo $row['image'] ?>" class="img-thumbnail m-3" alt="docter Image">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body m-3">
                                <h1 class="color-1 text-font-2">
                                    <?php echo $row['e_name']; ?>
                                </h1>
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="list-unstyled mt-4">
                                           
                                            <li><strong class="color-1 text-font fw-bold">Description :</strong>
                                                <?php echo $row['des']; ?>
                                            </li>
                                            <li><strong class="color-1 text-font fw-bold"> Short Description :</strong> 
                                                <?php echo $row['sdes']; ?>
                                            </li>
                                            <li>
                                           <a class="btn btn-lg btn-primary btn-lg-square rounded-btn w-50" href='<?php echo "seatreduce.php?e_id=" . $row['e_id']; ?>'>View Theme</a>
                                           </li>
                                        </ul>
                                    </div>
                                  
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
                <h1 class="card-title text-font-2 text-danger">No Animal Found</h1>
            </div>
        </div>
    </div>
    ';
    }
} else {
    $select = "SELECT * FROM `events` ORDER BY e_id desc";
    $result = $cn->query($select);
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <div class="container mt-3">
            <div class="card">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="extra work/NiceAdmin/assets/img/<?php echo $row['image'] ?>" class="img-thumbnail m-3" alt="Animal Image">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body m-3">
                            <h1 class="color-1 text-font-2">
                                <?php echo $row['e_name']; ?>
                            </h1>
                            <div class="row">
                                <div class="col-md-6">
                                <ul class="list-unstyled mt-4">
                                           
                                           <li><strong class="color-1 text-font fw-bold">Department :</strong>
                                               <?php echo $row['des']; ?>
                                           </li>
                                            <li><strong class="color-1 text-font fw-bold">Description :</strong>
                                               <?php echo $row['sdes']; ?>
                                           </li>
                                           <li>
                                           <a class="btn btn-lg btn-primary btn-lg-square rounded-btn w-50" href='<?php echo "seatreduce.php?e_id=" . $row['e_id']; ?>'>View Theme</a>
                                           </li>
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
?>

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
</body>

</html>