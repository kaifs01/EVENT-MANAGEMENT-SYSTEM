<?php
session_start();

include ("db/cn.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <link href="css/edited.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css/mdb.min.css" /> -->
    <style>
        .welcome-message {
            font-size: 20px;
            color: green;
        }

        .row {
            display: inline-flex;
        }
    </style>
</head>

<body>
    <?php
    @include 'header.php';
    ?>

    <section class="bg-light">
        <div class="container pb-5">

            <?php
            if (isset($_GET['id'])) {
                $b_id = $_GET['id'];

                $sql = "select * from bookings";
                $exc = mysqli_query($cn, $sql);
                $row = mysqli_fetch_assoc($exc);
                if (mysqli_num_rows($exc) > 0) {
                    while($data=mysqli_fetch_array($exc)){

                    
            ?>

            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="extra work/assets/img/event_img/dj1.jpg"
                            alt="Card image cap" id="product-detail">
                    </div>
                    <!-- <div class="card mb-3">
                        <img class="card-img img-fluid" src="extra work/assets/img/event_img/dj1.jpg" alt="Card image cap" id="product-detail">
                    </div> -->
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">Event Name: <?php echo $data['ev_type'];?></h1>
                            <p class="h3 py-2">Rs.<?php echo $data['price'];?>/-</p>
                            <p class="py-2">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <span class="list-inline-item text-dark">Rating 4.8 | 36 Comments</span>
                            </p>
                            <!-- <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Brand:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>Amul Milk</strong></p>
                                </li>
                            </ul> -->

                            <h6>Description:</h6>
                            <p>Amul Milk is the most hygenic liquid milk available in the market. It is pasteurised in
                                state-of-the-art processing plants and pouch-packed to make it conveniently available to
                                consumers. </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php }
                }
            }?>
        </div>
    </section>


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
    <!-- <script type="text/javascript" src="js/mdb.min.js"></script> -->

</body>

</html>