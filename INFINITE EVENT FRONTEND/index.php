<?php


include ("db/cn.php");

session_start();

if (isset($_POST['app'])) {
    $therapy = $_POST['therapy'];
    $drname = $_POST['drname'];
    $patientn = $_POST['pname'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];


    $insert = "insert into register(name,email,password,gender,age,city) values('$names','$emails','$pass','$gender','$age','$city')";

    $result = $cn->query($insert);

    if ($result) {
        header("location:index.php");
    }
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Infinite Impress Event </title>
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
</head>


<style>
    :root {
        --primary: linear-gradient(to right, #ee8425 0%, #f9488b 100%), linear-gradient(to right, #ee8425 0%, #f9488b 100%);
        --secondary: #354F8E;
        --light: #de0303;
        --dark: #de0303;
    }


    /* :root {
            --primary: linear-gradient(to right, #ee8425 0%, #f9488b 100%), linear-gradient(to right, #ee8425 0%, #f9488b 100%);
            
        } */

    .btn-primary {

        background-image: linear-gradient(to right, #ee8425 0%, #f9488b 100%), linear-gradient(to right, #ee8425 0%, #f9488b 100%);
    }

    /* .text-primary {
        color: linear-gradient(to right, #ee8425 0%, #f9488b 100%), linear-gradient(to right, #ee8425 0%, #f9488b 100%);
    } */

    .container1 {
        position: absolute;
        top: 41%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        height: 118%;
        background: #f5f5f5;
        box-shadow: 0 30px 50px #dbdbdb;
    }

    .container1 .slide .item {
        width: 155px;
        height: 200px;
        position: absolute;
        top: 50%;
        transform: translate(0, 75%);
        border-radius: 20px;
        /* box-shadow: 0 30px 50px #505050;
    background-position: 50% 50%; */
        background-size: cover;
        display: inline-block;
        transition: 0.5s;
    }



    .slide .item:nth-child(1),
    .slide .item:nth-child(2) {
        top: 0;
        left: 0;
        transform: translate(0, 0);
        border-radius: 0;
        width: 100%;
        height: 100%;
    }

    .slide .item:nth-child(3) {
        left: 55%;
    }

    .slide .item:nth-child(4) {
        left: calc(52% + 220px);
    }

    .slide .item:nth-child(5) {
        left: calc(49% + 440px);
    }

    /* here n = 0, 1, 2, 3,... */
    .slide .item:nth-child(n + 6) {
        left: calc(46% + 660px);
        opacity: 0;
    }

    .item .content {
        position: absolute;
        top: 50%;
        left: 100px;
        width: 300px;
        text-align: left;
        color: #eee;
        transform: translate(0, -50%);
        font-family: system-ui;
        display: none;
    }

    .slide .item:nth-child(2) .content {
        display: block;
    }


    .content .name {
        font-size: 40px;
        text-transform: uppercase;
        font-weight: bold;
        opacity: 0;
        animation: animate 1s ease-in-out 1 forwards;
    }

    .content .des {
        margin-top: 10px;
        margin-bottom: 20px;
        opacity: 0;
        animation: animate 1s ease-in-out 0.3s 1 forwards;
    }

    .content button {
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        opacity: 0;
        animation: animate 1s ease-in-out 0.6s 1 forwards;
    }


    @keyframes animate {
        from {
            opacity: 0;
            transform: translate(0, 100px);
            filter: blur(33px);
        }

        to {
            opacity: 1;
            transform: translate(0);
            filter: blur(0);
        }
    }

    .button {
        width: 100%;
        text-align: center;
        position: absolute;
        bottom: 20px;
    }

    .button button {
        width: 40px;
        height: 35px;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        margin: 0 5px;
        border: 1px solid #000;
        transition: 0.3s;
    }

    .button button:hover {
        background: #ababab;
        color: #fff;
    }

    .aboutset {
        padding-top: 40rem !important;
        padding-bottom: 3rem !important;
    }

    .about1 {
        font-size: 18px;
    }

    /* 
    .service-item:hover a.btn {
        bottom: 10px;
        top: 400px;
    } */

    /* Responsive Styles */
    /* @media (max-width: 768px) {
            .container1 .slide {
                display: flex;
                flex-wrap: nowrap;
                overflow-x: auto;
                gap: 15px;
            }
            .container1 .slide .item {
                flex: 0 0 calc(100% - 30px);
                height: 100%;
                background-size: cover;
            }
        }

        @media (min-width: 768px) {
            .container1 .slide {
                display: flex;
                flex-wrap: wrap;
                gap: 15px;
            }
            .container1 .slide .item {
                flex: 1 0 calc(33.333% - 30px);
                height: 100%;
                background-size: cover;
            } 
        }*/

    /* About Section Responsive Styles */
    /* @media (max-width: 992px) {
            .aboutset .container .col-lg-5 {
                display: none;
            }
            .aboutset .container .col-lg-7 {
                flex: 0 0 100%;
                max-width: 100%;
            }
            .aboutset .container .position-absolute.w-77 {
                width: 100%;
                height: auto;
                margin-left: 0;
            }
        } */
</style>

<body>
    <?php
    @include 'header.php';
    ?>

    <div class="container-fluid py-5">x
        <div class="container1 ">
            <div class="slide">




                <div class="item" style="background-image: url(img/slides_img/wedding1.jpg);">
                    <!-- <div class="content">
                    <div class="name">Switzerland</div>
                    <div class="des">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab, eum!</div>
                    <button>See More</button>
                </div> -->
                </div>
                <div class="item" style="background-image: url(img/slides_img/new-1.jpg);">
                    <!-- <div class="content">
                    <div class="name">Finland</div>
                    <div class="des">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab, eum!</div>
                    <button>See More</button>
                </div> -->
                </div>
                <div class="item" style="background-image: url(img/slides_img/birth1.jpg);">
                    <!-- <div class="content">
                    <div class="name">Iceland</div>
                    <div class="des">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab, eum!</div>
                    <button>See More</button>
                </div> -->
                </div>
                <div class="item" style="background-image: url(img/slides_img/formal1.png);">
                    <!-- <div class="content">
                    <div class="name">Australia</div>
                    <div class="des">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab, eum!</div>
                    <button>See More</button>
                </div> -->
                </div>
                <div class="item" style="background-image: url(img/img/img6.jpg);">
                    <!-- <div class="content">
                    <div class="name">Netherland</div>
                    <div class="des">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab, eum!</div>
                    <button>See More</button>
                </div> -->
                </div>
                <div class="item item1" style="background-image: url(img/img/img4.jpg);">
                    <!-- <div class="content">
                    <div class="name">Ireland</div>
                    <div class="des">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab, eum!</div>
                    <button>See More</button>
                </div> -->
                </div>

            </div>

            <div class="button">
                <button class="prev"><i class="bi-solid bi-arrow-left"></i></button>
                <button class="next"><i class="bi-solid bi-arrow-right"></i></button>
            </div>

        </div>
    </div>

    <!-- About Start -->
    <div class="container-fluid py-5 aboutset about-main" style="padding-top: 45rem !important;">
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
                </div>
            </div>
        </div>
    </div>

    <!-- About End -->


    <!-- Services Start -->
    <!-- <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Services</h5>
                <h1 class="display-4">Excellent Medical Services</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon mb-4">
                            <i class="fa fa-2x fa-user-md text-white"></i>
                        </div>
                        <h4 class="mb-3">Emergency Care</h4>
                        <p class="m-0">Emergency care in mental health refers to immediate and specialized assistance
                            provided to individuals experiencing acute mental health crises or emergencies.</p>
                        <a class="btn btn-lg btn-primary rounded-pill" href="">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon mb-4">
                            <i class="fa fa-2x fa-procedures text-white"></i>
                        </div>
                        <h4 class="mb-3">Operation & Surgery</h4>
                        <p class="m-0">Operation and surgery are medical procedures that involve physically intervening
                            in the body to diagnose, treat, or prevent various health conditions. </p>
                        <a class="btn btn-lg btn-primary rounded-pill" href="">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon mb-4">
                            <i class="fa fa-2x fa-stethoscope text-white"></i>
                        </div>
                        <h4 class="mb-3">Outdoor Checkup</h4>
                        <p class="m-0">It involves assessing a person's mental well-being, offering initial guidance,
                            and determining if further treatment or support is necessary. </p>
                        <a class="btn btn-lg btn-primary rounded-pill" href="">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon mb-4">
                            <i class="fa fa-2x fa-ambulance text-white"></i>
                        </div>
                        <h4 class="mb-3">Ambulance Service</h4>
                        <p class="m-0">Ambulance Service is a facility that provides emergency medical transportation
                            and care for individuals experiencing acute mental health crises.</p>
                        <a class="btn btn-lg btn-primary rounded-pill" href="">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon mb-4">
                            <i class="fa fa-2x fa-pills text-white"></i>
                        </div>
                        <h4 class="mb-3">Medicine & Pharmacy</h4>
                        <p class="m-0">
                            Medicine and pharmacy services is involve the administration of appropriate medications and
                            pharmaceutical treatments to patients with mental health conditions.</p>
                        <a class="btn btn-lg btn-primary rounded-pill" href="">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div
                        class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        <div class="service-icon mb-4">
                            <i class="fa fa-2x fa-microscope text-white"></i>
                        </div>
                        <h4 class="mb-3">Blood Testing</h4>
                        <p class="m-0">
                            A blood testing service is a involves the collection and analysis of a patient's blood to
                            assess their physical health, check for any underlying medical conditions, and monitor the
                            effects of medications on their body.</p>
                        <a class="btn btn-lg btn-primary rounded-pill" href="">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Services End -->


    <!-- Appointment Start -->
    <!-- <div class="container-fluid bg-primary my-5 py-5">
        <div class="container py-5">
            <div class="row gx-5">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="mb-4">
                        <h5 class="d-inline-block text-white text-uppercase border-bottom border-5">Appointment</h5>
                        <h1 class="display-4">Make An Appointment For Your Family</h1>
                    </div>
                    <p class="text-white mb-5">A Appointmenet is a brief , scheduled meeting between a patient and a
                        mental health professional. During this appointment, the patient may discuss their mental health
                        concerns, receive guidance, medication adjustments, or referrals for further care, all within a
                        shorter timeframe compared to a regular appointment. It serves as a quick check-in to address
                        immediate needs or concerns.</p>
                    <a class="btn btn-dark rounded-pill py-3 px-5 me-3" href="team.php">Find Doctor</a>
                    <a class="btn btn-outline-dark rounded-pill py-3 px-5" href="about.html">Read More</a>
                </div>
                <div class="col-lg-6">
                    <div class="bg-white text-center rounded p-5">
                        <h1 class="mb-4">Book An Appointment</h1>
                        <form method="post">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <select name="therapy" class="form-select bg-light border-0" style="height: 55px;">
                                        <option selected>Select Doctor</option>
                                        <option value="Dr Samir Parikh">Dr Samir Parikh</option>
                                        <option value="Dr Sameer Malhotra">Dr Sameer Malhotra</option>
                                        <option value="Dr Vishal Chhabra">Dr Vishal Chhabra</option>
                                        <option value="Dr Manish Jain ">Dr Manish Jain </option>
                                        <option value="Dr Ajit Dandekar  ">Dr Ajit Dandekar </option>
                                        <option value="Dr Vipul Rastogi">Dr Vipul Rastogi</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select name="drname" class="form-select bg-light border-0" style="height: 55px;">
                                        <option selected>Choose Department</option>
                                        <option value="Cognitive Behavioral">Cognitive Behavioral</option>
                                        <option value="Behavioral Sciences">Behavioral Sciences</option>
                                        <option value="Psychiatric">Psychiatric</option>
                                        <option value="psychological">psychological</option>
                                        <option value="honorary psychiatrist">honorary psychiatrist</option>
                                        <option value="Psychiatry Department">Psychiatry Department</option>

                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="pname" class="form-control bg-light border-0"
                                        placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" name="email" class="form-control bg-light border-0"
                                        placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="date" name="date" class="form-control bg-light border-0"
                                        placeholder="Date" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="time" name="time" class="form-control bg-light border-0"
                                        placeholder="Time" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <button name="app" class="btn btn-primary w-100 py-3" type="submit">Make An
                                        Appointment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Appointment End -->

    <!-- team star -->

    <div class="container-fluid py-5"
        style="background-image: url(img/img/count-bg.png); background-repeat: no-repeat; background-size: cover;">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Events</h5>
                <h1 class="display-4">Events Overview</h1>
            </div>
            <div class="owl-carousel team-carousel position-relative">
                <?Php
                if (isset($_POST['search'])) {
                    $find = $_POST['find'];
                    $select = "SELECT * FROM `events` WHERE e_name LIKE '%$find%'";
                    $result = $cn->query($select);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            ?>


                            <div class="team-item">
                                <div class="row g-0 bg-light rounded overflow-hidden">
                                    <div class="col-12 col-sm-5 h-100">
                                        <img class="img-fluid h-100"
                                            src="extra work/NiceAdmin/assets/img/<?php echo $row['image'] ?>"
                                            style="object-fit: cover;">
                                    </div>
                                    <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                                        <div class="mt-auto p-4" style="margin-top: 80px !important;">
                                            <h3>
                                                <?php echo $row['e_name'] ?>
                                            </h3>
                                            <!-- <p class="m-0">Dr Samir Parikh is the Director of the Mental Health & Behavioral Sciences Department at Fortis Hospital, Shalimar Bagh, New Delhi. He is amongst the best psychiatrist in India.</p> -->
                                            <p>
                                                <?php echo $row['sdes'] ?>
                                            </p>
                                            <p>
                                                Rs.
                                                <?php echo $row['price'] ?>/-
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
                                                href="appointment.php">Book Event</a>

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
                                    <h1 class="card-title text-font-2 text-danger">No Event Found</h1>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    $select = "SELECT * FROM `events` ORDER BY e_id desc";
                    $result = $cn->query($select);
                    while ($row = mysqli_fetch_array($result)) {
                        ?>

                        <div class="team-item">
                            <div class="row g-0 bg-light rounded overflow-hidden">
                                <div class="col-12 col-sm-5 h-100">
                                    <img class="img-fluid h-100 w-100"
                                        src="extra work/NiceAdmin/assets/img/<?php echo $row['image'] ?> "
                                        style="object-fit: cover;">
                                </div>
                                <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                                    <div class="mt-auto p-4">
                                        <h3>
                                            <?php echo $row['e_name'] ?>
                                        </h3>

                                        <!-- <p class="m-0">Dr Sameer Malhotra is the director of the Mental Health Department at Max Super Speciality Hospital in New Delhi. He provides services including stress management, Cognitive Behavioral Therapy. </p> -->
                                        <p>
                                            <?php echo $row['sdes'] ?>
                                        </p>
                                        <p>
                                            Rs.
                                            <?php echo $row['price'] ?>/-
                                        </p>
                                    </div>
                                    <div class="d-flex mt-auto border-top p-4">
                                        <!-- <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i
                                                class="fab fa-twitter"></i></a>
                                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i
                                                class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i
                                                class="fab fa-linkedin-in"></i></a> -->
                                        <a class="btn-lg btn-danger btn-lg-square rounded-btn w-50" href="team.php">Book
                                            Event</a>
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

    <!-- Services Start -->
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
                                            <p>
                                                Rs.
                                                <?php echo $row['price'] ?>/-
                                            </p>
                                        </div>
                                        <div class="d-flex mt-auto border-top p-4">
                                            <!-- <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i
                                                    class="fab fa-twitter"></i></a>
                                            <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i
                                                    class="fab fa-facebook-f"></i></a>
                                            <a class="btn btn-lg btn-primary btn-lg-square rounded-circle" href="#"><i
                                                    class="fab fa-linkedin-in"></i></a> -->
                                            <a class="btn btn-lg btn-primary btn-lg-square rounded-circle" href="service_book.php">
                                                Book Service</a>

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
                                            Rs.
                                            <?php echo $row['price'] ?>/-
                                        </p>
                                    </div>
                                    <div class="d-flex mt-auto border-top p-4">
                                        <!-- <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i
                                                class="fab fa-twitter"></i></a>
                                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i
                                                class="fab fa-facebook-f"></i></a>
                                        <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i
                                                class="fab fa-linkedin-in"></i></a> -->
                                        <a class="btn-lg btn-danger btn-lg-square rounded-btn w-50" href="service_book.php">Book
                                            Service</a>
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
    <!-- Services End -->
    <hr>
    <!-- Blog Start  -->
    <!--<div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Blog Post</h5>
                <h1 class="display-4">Our Latest Medical Blog Posts</h1>
            </div>

            <!-- Carousel Start -->
    <!--<div id="blogCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">

                    <!-- Slide 1 -->
    <!--  <div class="carousel-item active">
                        <div class="row g-5">
                            <div class="col-xl-4 col-lg-6">
                                <div class="bg-light rounded overflow-hidden">
                                    <img class="img-fluid w-100" src="img/blog-1.jpg" alt="">
                                    <div class="p-4">
                                        <a class="h3 d-block mb-3" href="">Dolor clita vero elitr sea stet dolor justo
                                            diam</a>
                                        <p class="m-0">Dolor lorem eos dolor duo et eirmod sea. Dolor sit magna
                                            rebum clita rebum dolor stet amet justo</p>
                                    </div>
                                    <div class="d-flex justify-content-between border-top p-4">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle me-2" src="img/user.jpg" width="25" height="25"
                                                alt="">
                                            <small>John Doe</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="ms-3"><i
                                                    class="far fa-eye text-primary me-1"></i>12345</small>
                                            <small class="ms-3"><i
                                                    class="far fa-comment text-primary me-1"></i>123</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6">
                                <div class="bg-light rounded overflow-hidden">
                                    <img class="img-fluid w-100" src="img/blog-1.jpg" alt="">
                                    <div class="p-4">
                                        <a class="h3 d-block mb-3" href="">Dolor clita vero elitr sea stet dolor justo
                                            diam</a>
                                        <p class="m-0">Dolor lorem eos dolor duo et eirmod sea. Dolor sit magna
                                            rebum clita rebum dolor stet amet justo</p>
                                    </div>
                                    <div class="d-flex justify-content-between border-top p-4">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle me-2" src="img/user.jpg" width="25" height="25"
                                                alt="">
                                            <small>John Doe</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="ms-3"><i
                                                    class="far fa-eye text-primary me-1"></i>12345</small>
                                            <small class="ms-3"><i
                                                    class="far fa-comment text-primary me-1"></i>123</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6">
                                <div class="bg-light rounded overflow-hidden">
                                    <img class="img-fluid w-100" src="img/blog-1.jpg" alt="">
                                    <div class="p-4">
                                        <a class="h3 d-block mb-3" href="">Dolor clita vero elitr sea stet dolor justo
                                            diam</a>
                                        <p class="m-0">Dolor lorem eos dolor duo et eirmod sea. Dolor sit magna
                                            rebum clita rebum dolor stet amet justo</p>
                                    </div>
                                    <div class="d-flex justify-content-between border-top p-4">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle me-2" src="img/user.jpg" width="25" height="25"
                                                alt="">
                                            <small>John Doe</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="ms-3"><i
                                                    class="far fa-eye text-primary me-1"></i>12345</small>
                                            <small class="ms-3"><i
                                                    class="far fa-comment text-primary me-1"></i>123</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Repeat for other posts as needed -->
    <!--  </div>
                    </div>

                    <!-- Slide 2 -->
    <!-- <div class="carousel-item">
                        <div class="row g-5">
                            <div class="col-xl-4 col-lg-6">
                                <div class="bg-light rounded overflow-hidden">
                                    <img class="img-fluid w-100" src="img/blog-2.jpg" alt="">
                                    <div class="p-4">
                                        <a class="h3 d-block mb-3" href="">Dolor clita vero elitr sea stet dolor justo
                                            diam</a>
                                        <p class="m-0">Dolor lorem eos dolor duo et eirmod sea. Dolor sit magna
                                            rebum clita rebum dolor stet amet justo</p>
                                    </div>
                                    <div class="d-flex justify-content-between border-top p-4">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle me-2" src="img/user.jpg" width="25" height="25"
                                                alt="">
                                            <small>John Doe</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="ms-3"><i
                                                    class="far fa-eye text-primary me-1"></i>12345</small>
                                            <small class="ms-3"><i
                                                    class="far fa-comment text-primary me-1"></i>123</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6">
                                <div class="bg-light rounded overflow-hidden">
                                    <img class="img-fluid w-100" src="img/blog-2.jpg" alt="">
                                    <div class="p-4">
                                        <a class="h3 d-block mb-3" href="">Dolor clita vero elitr sea stet dolor justo
                                            diam</a>
                                        <p class="m-0">Dolor lorem eos dolor duo et eirmod sea. Dolor sit magna
                                            rebum clita rebum dolor stet amet justo</p>
                                    </div>
                                    <div class="d-flex justify-content-between border-top p-4">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle me-2" src="img/user.jpg" width="25" height="25"
                                                alt="">
                                            <small>John Doe</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="ms-3"><i
                                                    class="far fa-eye text-primary me-1"></i>12345</small>
                                            <small class="ms-3"><i
                                                    class="far fa-comment text-primary me-1"></i>123</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6">
                                <div class="bg-light rounded overflow-hidden">
                                    <img class="img-fluid w-100" src="img/blog-2.jpg" alt="">
                                    <div class="p-4">
                                        <a class="h3 d-block mb-3" href="">Dolor clita vero elitr sea stet dolor justo
                                            diam</a>
                                        <p class="m-0">Dolor lorem eos dolor duo et eirmod sea. Dolor sit magna
                                            rebum clita rebum dolor stet amet justo</p>
                                    </div>
                                    <div class="d-flex justify-content-between border-top p-4">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle me-2" src="img/user.jpg" width="25" height="25"
                                                alt="">
                                            <small>John Doe</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="ms-3"><i
                                                    class="far fa-eye text-primary me-1"></i>12345</small>
                                            <small class="ms-3"><i
                                                    class="far fa-comment text-primary me-1"></i>123</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Repeat for other posts as needed -->
    <!-- </div>
                    </div>

                    <!-- Slide 3 -->
    <!--<div class="carousel-item">
                        <div class="row g-5">
                            <div class="col-xl-4 col-lg-6">
                                <div class="bg-light rounded overflow-hidden">
                                    <img class="img-fluid w-100" src="img/blog-3.jpg" alt="">
                                    <div class="p-4">
                                        <a class="h3 d-block mb-3" href="">Dolor clita vero elitr sea stet dolor justo
                                            diam</a>
                                        <p class="m-0">Dolor lorem eos dolor duo et eirmod sea. Dolor sit magna
                                            rebum clita rebum dolor stet amet justo</p>
                                    </div>
                                    <div class="d-flex justify-content-between border-top p-4">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle me-2" src="img/user.jpg" width="25" height="25"
                                                alt="">
                                            <small>John Doe</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="ms-3"><i
                                                    class="far fa-eye text-primary me-1"></i>12345</small>
                                            <small class="ms-3"><i
                                                    class="far fa-comment text-primary me-1"></i>123</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6">
                                <div class="bg-light rounded overflow-hidden">
                                    <img class="img-fluid w-100" src="img/blog-3.jpg" alt="">
                                    <div class="p-4">
                                        <a class="h3 d-block mb-3" href="">Dolor clita vero elitr sea stet dolor justo
                                            diam</a>
                                        <p class="m-0">Dolor lorem eos dolor duo et eirmod sea. Dolor sit magna
                                            rebum clita rebum dolor stet amet justo</p>
                                    </div>
                                    <div class="d-flex justify-content-between border-top p-4">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle me-2" src="img/user.jpg" width="25" height="25"
                                                alt="">
                                            <small>John Doe</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="ms-3"><i
                                                    class="far fa-eye text-primary me-1"></i>12345</small>
                                            <small class="ms-3"><i
                                                    class="far fa-comment text-primary me-1"></i>123</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6">
                                <div class="bg-light rounded overflow-hidden">
                                    <img class="img-fluid w-100" src="img/blog-3.jpg" alt="">
                                    <div class="p-4">
                                        <a class="h3 d-block mb-3" href="">Dolor clita vero elitr sea stet dolor justo
                                            diam</a>
                                        <p class="m-0">Dolor lorem eos dolor duo et eirmod sea. Dolor sit magna
                                            rebum clita rebum dolor stet amet justo</p>
                                    </div>
                                    <div class="d-flex justify-content-between border-top p-4">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle me-2" src="img/user.jpg" width="25" height="25"
                                                alt="">
                                            <small>John Doe</small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="ms-3"><i
                                                    class="far fa-eye text-primary me-1"></i>12345</small>
                                            <small class="ms-3"><i
                                                    class="far fa-comment text-primary me-1"></i>123</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Repeat for other posts as needed -->
    <!--</div>
                    </div>

                </div>
                <!-- Carousel Controls -->
    <!-- <button class="carousel-control-prev" type="button" data-bs-target="#blogCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#blogCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <!-- Carousel End -->

    <!--</div>
    </div>-->



    <!-- Blog End -->


    <!-- Team End -->


    <!-- Search Start -->
    <!-- <div class="container-fluid bg-primary my-5 py-5">
        <div class="container py-5">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-white text-uppercase border-bottom border-5">Find A Doctor</h5>
                <h1 class="display-4 mb-4">Find A Healthcare Professionals</h1>
                <h5 class="text-white fw-normal">Duo ipsum erat stet dolor sea ut nonumy tempor. Tempor duo lorem eos sit sed ipsum takimata ipsum sit est. Ipsum ea voluptua ipsum sit justo</h5>
            </div>
            <div class="mx-auto" style="width: 100%; max-width: 600px;">
                <div class="input-group">
                    <select class="form-select border-primary w-25" style="height: 60px;">
                        <option selected>Department</option>
                        <option value="1">Department 1</option>
                        <option value="2">Department 2</option>
                        <option value="3">Department 3</option>
                    </select>
                    <input type="text" class="form-control border-primary w-50" placeholder="Keyword">
                    <button class="btn btn-dark border-0 w-25">Search</button>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Search End -->


    <!-- Testimonial Start
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Testimonial</h5>
                <h1 class="display-4">Patients Say About Our Services</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="owl-carousel testimonial-carousel">
                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-5">
                                <img class="img-fluid rounded-circle mx-auto" src="img/testimonial-1.jpg" alt="">
                                <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle" style="width: 60px; height: 60px;">
                                    <i class="fa fa-quote-left fa-2x text-primary"></i>
                                </div>
                            </div>
                            <p class="fs-4 fw-normal">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat. Erat dolor rebum sit ipsum.</p>
                            <hr class="w-25 mx-auto">
                            <h3>Patient Name</h3>
                            <h6 class="fw-normal text-primary mb-3">Profession</h6>
                        </div>
                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-5">
                                <img class="img-fluid rounded-circle mx-auto" src="img/testimonial-2.jpg" alt="">
                                <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle" style="width: 60px; height: 60px;">
                                    <i class="fa fa-quote-left fa-2x text-primary"></i>
                                </div>
                            </div>
                            <p class="fs-4 fw-normal">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat. Erat dolor rebum sit ipsum.</p>
                            <hr class="w-25 mx-auto">
                            <h3>Patient Name</h3>
                            <h6 class="fw-normal text-primary mb-3">Profession</h6>
                        </div>
                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-5">
                                <img class="img-fluid rounded-circle mx-auto" src="img/testimonial-3.jpg" alt="">
                                <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle" style="width: 60px; height: 60px;">
                                    <i class="fa fa-quote-left fa-2x text-primary"></i>
                                </div>
                            </div>
                            <p class="fs-4 fw-normal">Dolores sed duo clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem magna ut et, nonumy et labore et tempor diam tempor erat. Erat dolor rebum sit ipsum.</p>
                            <hr class="w-25 mx-auto">
                            <h3>Patient Name</h3>
                            <h6 class="fw-normal text-primary mb-3">Profession</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    Testimonial End -->

    <!-- Footer Start -->
    <?php
    @include "footer.php";
    ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>






    <script>
        let next = document.querySelector('.next')
        let prev = document.querySelector('.prev')

        next.addEventListener('click', function () {
            let items = document.querySelectorAll('.item')
            document.querySelector('.slide').appendChild(items[0])
        })

        prev.addEventListener('click', function () {
            let items = document.querySelectorAll('.item')
            document.querySelector('.slide').prepend(items[items.length - 1]) // here the length of items = 6
        })
    </script>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>