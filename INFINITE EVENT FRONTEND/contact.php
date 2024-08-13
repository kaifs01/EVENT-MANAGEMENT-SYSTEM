<?php


include ("db/cn.php");
session_start();
// session_start();

// if (isset($_POST['contact'])) {
//     // $name = $_POST['name'];
//     // $email = $_POST['email'];
//     $sub = $_POST['sub'];
//     $msg = $_POST['msg'];


//     $insert = "insert into card(sub,msg) values('$sub','$msg')";

//     $result = $cn->query($insert);

//     if ($result) {
//         header("location:contact.php");
//     }
// }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>infinite impress event</title>
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

<body>
    <?php
    @include 'header.php';
    ?>


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Any Questions?</h5>
                <h1 class="display-4">Please Feel Free To Contact Us</h1>
            </div>
            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="bg-light rounded d-flex flex-column align-items-center justify-content-center text-center"
                        style="height: 200px;">
                        <div class="d-flex align-items-center justify-content-center bg-primary rounded-circle mb-4"
                            style="width: 100px; height: 70px; transform: rotate(-15deg);">
                            <i class="fa fa-2x fa-location-arrow text-white" style="transform: rotate(15deg);"></i>
                        </div>
                        <h6 class="mb-0">Shop No.111 NEAR TGB Circle, Surat, Gujarat 395009 </h6>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="bg-light rounded d-flex flex-column align-items-center justify-content-center text-center"
                        style="height: 200px;">
                        <div class="d-flex align-items-center justify-content-center bg-primary rounded-circle mb-4"
                            style="width: 100px; height: 70px; transform: rotate(-15deg);">
                            <i class="fa fa-2x fa-phone text-white" style="transform: rotate(15deg);"></i>
                        </div>
                        <h6 class="mb-0">+91 123 456 7890</h6>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="bg-light rounded d-flex flex-column align-items-center justify-content-center text-center"
                        style="height: 200px;">
                        <div class="d-flex align-items-center justify-content-center bg-primary rounded-circle mb-4"
                            style="width: 100px; height: 70px; transform: rotate(-15deg);">
                            <i class="fa fa-2x fa-envelope-open text-white" style="transform: rotate(15deg);"></i>
                        </div>
                        <h6 class="mb-0">infinitevent@gmail.com</h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12" style="height: 500px;">
                    <div class="position-relative h-100">
                        <!-- <iframe class="position-relative w-100 h-100"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                            frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                            tabindex="0"></iframe> -->
                        <iframe class="position-relative w-100 h-100"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3719.9760164016852!2d72.78266362845905!3d21.193111689995398!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04fd433055c91%3A0x9bfa0fc2f9b0578f!2sThink%20Universal%20%2C%20Psychologist%20Dr%20Urvesh%20Chauhan%20(Mental%20Health%20counseling%20Centre)!5e0!3m2!1sen!2sin!4v1696524179452!5m2!1sen!2sin"
                            width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <!-- <div class="row justify-content-center position-relative" style="margin-top: -100px; z-index: 1; color: #13C5DD;">
                <div class="col-lg-8">
                    <div class="bg-white rounded p-5 m-5 mb-0"> 
                        <form>
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control bg-light border-0" placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Subject" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control bg-light border-0" rows="5" placeholder="Message"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <!-- Contact End -->








    <div class="container-fluid bg-primary my-5 py-5"
        style="background-image: url(img/img/count-bg.png); background-repeat: no-repeat; background-size: cover;">
        <div class="container py-5">
            <div class="row gx-1">

                <div class="col-lg-6 center">
                    <div class="bg-white text-center rounded p-5">
                        <h1 class="mb-4">Contact us</h1>

                        <?php
                        // $id=$_GET['eid'];
                        // $select="SELECT * FROM ev_users where id='$id'";
                        // $exc=mysqli_query($cn,$select);
                        // while($row=mysqli_fetch_array($exc)){
                        ?>

                        <form method="post">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" name="name" class="form-control bg-light border-0"
                                        placeholder="Your Name" style="height: 55px;"
                                        value='<?php if(isset($_SESSION["username"])){
                                            echo $_SESSION["username"];
                                        }?>'/>   
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" name="email" class="form-control bg-light border-0"
                                        placeholder="Your Email" style="height: 55px;"
                                        value='<?php if(isset($_SESSION["username"])){
                                            echo $_SESSION["email"];
                                        }?>' ?>
                                </div>
                                <div class="col-12">
                                    <input type="text" name="subject" class="form-control bg-light border-0"
                                        placeholder="Subject" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <textarea name="message" class="form-control bg-light border-0" rows="5"
                                        placeholder="Message"></textarea>
                                </div>
                                <div class="col-12">
                                    <button name="send" class="btn btn-primary w-100 py-3" type="submit">Send
                                        Message</button>
                                </div>
                            </div>
                        </form>
                        <?php //}  ?>
                    </div>
                </div>
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
</body>

</html>



<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
if (isset($_POST["send"])) {

    $mail = new PHPMailer(true);

    //Server settings
    $mail->isSMTP();                              //Send using SMTP
    $mail->Host = 'smtp.gmail.com';       //Set the SMTP server to send through
    $mail->SMTPAuth = true;             //Enable SMTP authentication
    $mail->Username = 'yogeshrajput0806@gmail.com';   //SMTP write your email
    $mail->Password = 'wxowiaemzzjseeje';      //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
    $mail->Port = 465;

    //Recipients
    $mail->setFrom($_POST["email"], $_POST["name"]); // Sender Email and name
    $mail->addAddress('kazikaif@gmail.com');     //Add a recipient email  
    $mail->addReplyTo($_POST["email"], $_POST["name"]); // reply to sender email

    //Content
    $mail->isHTML(true);               //Set email format to HTML
    $mail->Subject = $_POST["subject"];   // email subject headings
    $mail->Body = $_POST["message"]; //email message

    // Success sent message alert
    $mail->send();
    echo
        " 
    <script> 
     alert('Message was sent successfully!');
  
    </script>
    ";
}
?>