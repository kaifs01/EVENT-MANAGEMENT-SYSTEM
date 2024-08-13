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
    <style>
        .welcome-message {
            font-size: 20px;
            color: green;
        }
    </style>
</head>

<body>
    <?php
    @include 'header.php';
    ?>
    <div class="container-fluid bg-light my-5 py-5">
        <div class="container py-5">
            <div class="row gx-1">



                <!-- <div class="col-lg-6 center">
                    <div class="bg-white text-center rounded p-5">
                        <h1 class="mb-4">Book An Appointment</h1>
                        <form method="post" action="">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="name" class="form-control bg-light border-0" placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" name="email" class="form-control bg-light border-0" placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <input type="text" name="sub" class="form-control bg-light border-0" placeholder="Subject" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <textarea name="msg" class="form-control bg-light border-0" rows="5" placeholder="Message"></textarea>
                                </div>
                                <div class="col-12">
                                    <button name="contact" class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> -->


                <section class="section dashboard">
                    <!-- New Booking -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <div class="title">
                                    <h5 class="card-title">Bookings Reports </h5>
                                </div>
                                <table class="table datatable">
                                    <thead>
                                        <tr>

                                            <th scope="col">Customer Name</th>
                                            <th scope="col">Event</th>
                                            <th scope="col">Theme</th>
                                            <th scope="col">Booking Date</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Cancel</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $select = "SELECT * FROM `bookings`";
                                        $result = mysqli_query($cn, $select);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>

                                            <tr>
                                                <td>
                                                    <?php echo $row['c_name']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['ev_type']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['theme']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['booking_date']; ?>
                                                </td>


                                                <?php if ($row['status'] == "Cancel") { ?>


                                                    <td>
                                                        <span class="badge bg-danger">
                                                            <?php echo $row['status'] = "Cancelled"; ?>
                                                        </span>
                                                    </td>


                                                <?php } else if ($row['status'] == "Approve") { ?>

                                                        <td>
                                                            <span class="badge bg-success">
                                                            <?php echo "Approve"; ?>
                                                            </span>
                                                        </td>

                                                <?php } else if ($row['status'] == "Reject") { ?>

                                                            <td>
                                                                <span class="badge bg-danger">
                                                            <?php echo "Reject"; ?>
                                                                </span>
                                                            </td>

                                                <?php } else { ?>
                                                            <td>
                                                                <span class="badge bg-warning">
                                                            <?php echo "Pandding"; ?>
                                                                </span>
                                                            </td>
                                                <?php } ?>

                                                <td>
                                                    <a href="cancel_booking.php?editid=<?php echo $row['id']; ?>"
                                                        class="btn btn-sm btn-outline-warning"><i class="fa fa-edit"
                                                            aria-hidden="true" title="Take action"></i></a>
                                                    <!-- <a href="booking_deatil.php?edit=<?php //echo $row['id']; ?>"
                                                        class="btn btn-sm btn-outline-warning"><i class="fa fa-eye"
                                                            aria-hidden="true" title="Show Booking Detail"></i></a> -->
                                                </td>
                                            </tr>

                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>
                    <!-- End New Booking -->
                </section>

            </div>
        </div>
    </div>


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