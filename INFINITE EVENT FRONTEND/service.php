<?php


include ("db/cn.php");

session_start();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Infinite Inpress Events</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/edited.css" rel="stylesheet">
</head>
<style>
    :root {
        --primary: linear-gradient(to right, #ee8425 0%, #f9488b 100%), linear-gradient(to right, #ee8425 0%, #f9488b 100%);
        --secondary: #354F8E;
        --light: #EFF5F9;
        --dark: #fff;


    }
</style>

<body>
  <?php
    @include 'header.php';
    ?>


    <!-- Services start -->

    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Services</h5>
                <h1 class="display-4">Service Overview</h1>
            </div>
            <div class="owl-carousel team-carousel position-relative">
                <?Php
                if (isset($_POST['search'])) {
                    $find = $_POST['find'];
                    $select = "SELECT * FROM `ev_services` WHERE s_name LIKE '%$find%'";
                    $result = $cn->query($select);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            ?>


                            <div class="team-item">
                                <div class="row g-0 bg-light rounded overflow-hidden">
                                    <div class="col-12 col-sm-5 h-100">
                                        <img class="img-fluid h-100"
                                            src="extra work/NiceAdmin/assets/img/<?php echo $row['s_img'] ?>"
                                            style="object-fit: cover;">
                                    </div>
                                    <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                                        <div class="mt-auto p-4">
                                            <h3>
                                                <?php echo $row['s_name'] ?>
                                            </h3>
                                            <!-- <p class="m-0">Dr Samir Parikh is the Director of the Mental Health & Behavioral Sciences Department at Fortis Hospital, Shalimar Bagh, New Delhi. He is amongst the best psychiatrist in India.</p> -->
                                            <p>
                                                <?php echo $row['desc'] ?>
                                            </p>
                                        </div>
                                        <div class="d-flex mt-auto border-top p-4">
                                            <!-- <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i
                                                    class="fab fa-twitter"></i></a>
                                            <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i
                                                    class="fab fa-facebook-f"></i></a>
                                            <a class="btn btn-lg btn-primary btn-lg-square rounded-circle" href="#"><i
                                                    class="fab fa-linkedin-in"></i></a> -->
                                            <a class="btn btn-lg btn-primary btn-lg-square rounded-circle"
                                                href="service_book.php">Book Service</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else { ?>
                        <div class="container mt-4">
                            <div class="card text-center bg-warning">
                                <div class="card-body">
                                    <h1 class="card-title text-font-2 text-danger">No services Found</h1>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    $select = "SELECT * FROM `ev_services` ORDER BY id desc";
                    $result = $cn->query($select);
                    while ($row = mysqli_fetch_array($result)) {
                        ?>

                        <div class="team-item">
                            <div class="row g-0 bg-light rounded overflow-hidden">
                                <div class="col-12 col-sm-5 h-100">
                                    <img class="img-fluid h-100 w-100"
                                        src="extra work/NiceAdmin/assets/img/<?php echo $row['s_img'] ?> "
                                        style="object-fit: cover;">
                                </div>
                                <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                                    <div class="mt-auto p-4">
                                        <h3>
                                            <?php echo $row['s_name'] ?>
                                        </h3>

                                        <!-- <p class="m-0">Dr Sameer Malhotra is the director of the Mental Health Department at Max Super Speciality Hospital in New Delhi. He provides services including stress management, Cognitive Behavioral Therapy. </p> -->
                                        <p>
                                            <?php echo $row['desc'] ?>
                                        </p>
                                        <p>
                                            Rs.<?php echo $row['price'] ?>/-
                                        </p>
                                    </div>
                                    <div class="d-flex mt-auto border-top p-4">
                                        <!-- <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i
                                                class="fab fa-twitter"></i></a>
                                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i
                                                class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i
                                                class="fab fa-linkedin-in"></i></a> -->
                                        <a class="btn-lg btn-danger btn-lg-square rounded-btn w-50"
                                            href="service_book.php?id=<?php echo $row['id'];?>">Book Service</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>

            </div>
        </div>
    </div>



    <!-- services End -->











     <!-- Team Start -->
     <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h1 class="display-4">Our Team</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="owl-carousel testimonial-carousel">
                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-5">
                                <img class="img-fluid rounded-circle mx-auto" src="img/my imgae.jpg" alt="">
                                <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle" style="width: 60px; height: 60px;">
                                    <i class="fa fa-quote-left fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h3>Kazi Kaif</h3>
                            <h6 class="fw-normal text-primary mb-3">Backend Developer</h6>
                        </div>
                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-5">
                                <img class="img-fluid rounded-circle mx-auto" src="img/harsh.png" alt="">
                                <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle" style="width: 60px; height: 60px;">
                                    <i class="fa fa-quote-left fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h3>Rajput Harsh</h3>
                            <h6 class="fw-normal text-primary mb-3">Backend Developer</h6>
                        </div>
                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-5">
                                <img class="img-fluid rounded-circle mx-auto" src="img/avntika.png" alt="">
                                <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle" style="width: 60px; height: 60px;">
                                    <i class="fa fa-quote-left fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h3>Rajput Avntika</h3>
                            <h6 class="fw-normal text-primary mb-3">Frontend Developer</h6>
                        </div>
                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-5">
                                <img class="img-fluid rounded-circle mx-auto" src="img/testimonial-3.jpg" alt="">
                                <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle" style="width: 60px; height: 60px;">
                                    <i class="fa fa-quote-left fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h3>Singh Khusboo</h3>
                            <h6 class="fw-normal text-primary mb-3">Frontend Developer</h6>
                        </div>
                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-5">
                                <img class="img-fluid rounded-circle mx-auto" src="img/KAIF.jpg" alt="">
                                <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle" style="width: 60px; height: 60px;">
                                    <i class="fa fa-quote-left fa-2x text-primary"></i>
                                </div>
                            </div>
                            <h3>Shaikh Kaif</h3>
                            <h6 class="fw-normal text-primary mb-3">API Developer</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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