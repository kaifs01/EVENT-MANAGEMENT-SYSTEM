<?php
include ("db/cn.php");
session_start()
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

    <style>
        :root {
            --primary: linear-gradient(to right, #ee8425 0%, #f9488b 100%), linear-gradient(to right, #ee8425 0%, #f9488b 100%);
            --secondary: #354F8E;
            --light: #0b6099;
            --dark: #1D2A4D;
        }

        .about-main {
            padding-top: 1rem !important;

        }

        .about1 {
            font-size: 18px;
        }

        .service-item .service-icon {
            width: 150px;
            transform: rotate(360deg);
        }

        .service-item {
            height: 500px;
        }
    </style>
</head>

<body>
<?php
    @include 'header.php';
    ?>


    <!-- About Start -->
    <div class="container-fluid py-5 about-main">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-77 h-100 rounded" src="img/about.png"
                            style="object-fit: cover; margin-left: 100px;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="mb-4">
                        <h1 class="d-inline-block display-4 text-primary text-uppercase border-bottom border-5">About Us
                        </h1>
                        <!-- <h1 class="display-4">Best Event Planners For Your Functions</h1> -->
                    </div>
                    <p class="about1">
                        Welcome to Infinite Impress Events, where imagination meets execution in the world of event
                        planning. Founded on the belief that every occasion deserves to shine with brilliance,
                        Infinite Impress Events is dedicated to turning your dreams into breathtaking realities.
                    </p>
                    <p class="about1">
                        At Infinite Impress, we pride ourselves on our innovative approach, meticulous attention to
                        detail,
                        and unwavering commitment to exceeding expectations. With a team of passionate professionals who
                        thrive on creativity and excellence, we bring a fresh perspective to every event we undertake.
                    </p>
                    <!-- <div class="row g-3 pt-3">
                        <div class="col-sm-3 col-6">
                            <div class="bg-light text-center rounded-circle py-4">
                                <i class="fa fa-3x fa-user-md text-primary mb-3"></i>
                                <h6 class="mb-0">Qualified<small class="d-block text-primary">Doctors</small></h6>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="bg-light text-center rounded-circle py-4">
                                <i class="fa fa-3x fa-procedures text-primary mb-3"></i>
                                <h6 class="mb-0">Emergency<small class="d-block text-primary">Services</small></h6>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="bg-light text-center rounded-circle py-4">
                                <i class="fa fa-3x fa-microscope text-primary mb-3"></i>
                                <h6 class="mb-0">Accurate<small class="d-block text-primary">Testing</small></h6>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="bg-light text-center rounded-circle py-4">
                                <i class="fa fa-3x fa-ambulance text-primary mb-3"></i>
                                <h6 class="mb-0">Free<small class="d-block text-primary">Ambulance</small></h6>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- <div>
                    <p>4. Speaker and Participant Management: Manages information about speakers, presenters, and
                        participants, including bios, contact details, and session assignments.</p>
                    <p>5. Marketing and Promotion: Includes tools for email marketing, social media integration, and
                        other promotional activities to attract attendees.</p>
                    <p>6. Budget and Financial Management: Helps in creating and managing budgets, tracking expenses,
                        and generating financial reports.</p>
                    <p>7. Exhibitor and Sponsor Management: Manages information about exhibitors and sponsors, including
                        booth assignments, promotional materials, and agreements.</p>
                    <p>8. Networking and Engagement: Provides networking tools like matchmaking, messaging, and attendee
                        interaction to enhance the attendee experience.</p>
                    <p>9. Analytics and Reporting: Offers analytics and reporting features to track key metrics,
                        evaluate event success, and make data-driven decisions for future events.</p>
                    <p>10. Mobile Access: Many EMSs offer mobile apps or mobile-friendly interfaces to allow organizers
                        and attendees to access information and manage activities on the go.</p>

                    <h4 class="display">Benefits of Using an Event Management System:</h4>
                    
                    <p>Efficiency: Automates many tasks, saving time and reducing manual effort.</p>
                    <p>Accuracy: Reduces errors and improves the accuracy of data and information.</p>
                    <p>Organization: Provides a centralized platform to manage all aspects of the event.</p>
                    <p>Cost-Effective: Helps in budget management and cost control, leading to cost savings.</p>
                    <p>Enhanced Attendee Experience: Improves attendee engagement and satisfaction through better planning
                    and communication.</p>
                    <p>Data-Driven Decisions: Enables organizers to make informed decisions based on analytics and
                    insights.</p>
                </div> -->
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Services Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h1 class="display-4">Why Choose Us</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center" style="height: 450px;">
                        <div class="service-icon mb-4">
                            <img src="img/choose1.png" alt="" style=" height: 50px;">
                        </div>
                        <h4 class="mb-3">Expertise and Experience</h4>
                        <p class="m-0">
                            With years of experience in the event planning industry, Infinite Impress Events boasts a
                            team
                            of seasoned professionals who bring a wealth of expertise to every project. From intimate
                            gatherings to large-scale productions, our team has the knowledge and skills to turn your
                            event vision into reality.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center" style="height: 450px;">
                        <div class="service-icon mb-4">
                            <img src="img/choose2.png" alt="" style=" height: 50px;">
                        </div>
                        <h4 class="mb-3">Personalized Service</h4>
                        <p class="m-0">
                            At Infinite Impress Events, we understand that every event is unique. That's why we offer
                            personalized service tailored to meet your specific needs and preferences. From the initial
                            consultation to the final farewell, our dedicated event planners work closely with you to
                            ensure that every detail is taken care of and your event is a reflection of your individual
                            style and vision.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center" style="height: 450px;">
                        <div class="service-icon mb-4">
                            <img src="img/choose3.png" alt="" style=" height: 50px;">
                        </div>
                        <h4 class="mb-3">Attention to Detail</h4>
                        <p class="m-0">
                            We believe that it's the little things that make a big difference. That's why we pride
                            ourselves on our meticulous attention to detail. From selecting the perfect venue to
                            coordinating every aspect of the event, we leave no stone unturned in ensuring that every
                            element of your event is executed flawlessly.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center" style="height: 450px;">
                        <div class="service-icon mb-4">
                            <img src="img/choose4.png" alt="" style=" height: 50px;">
                        </div>
                        <h4 class="mb-3">Exceptional Customer Care</h4>
                        <p class="m-0">
                            At Infinite Impress Events, we're committed to providing exceptional customer care every step
                            of the way. From your initial inquiry to the final farewell, our friendly and professional
                            team is here to support you and ensure that your event experience is nothing short of
                            extraordinary. We go above and beyond to exceed your expectations and make your event truly
                            unforgettable.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Services End -->
<hr>
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

    <!-- Footer Start -->
    <?php
    include ("footer.php");
    ?>
    <!-- Footer End -->


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