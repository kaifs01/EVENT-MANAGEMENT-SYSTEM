<?php
if (!isset($_SESSION) || session_id() == "" || session_status() === PHP_SESSION_NONE)
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
    <?php $currentpage = basename($_SERVER['REQUEST_URI']); ?>

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
</head>
<style>
    :root {
        --primary: linear-gradient(to right, #ee8425 0%, #f9488b 100%), linear-gradient(to right, #ee8425 0%, #f9488b 100%);
        --secondary: #354F8E;
        --light: #EFF5F9;
        --dark: #000;
    }

    a .nav-profile img {
        max-height: 36px;
    }
</style>

<body>



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
                        <a class="nav-item nav-link" aria-current="page" href="index.php" <?php if ($currentpage === "index.php") { ?> style="color:red" <?php } ?>>Home</a>
                        <a class="nav-item nav-link" aria-current="page" href="service.php" <?php if ($currentpage === "service.php") { ?> style="color:red" <?php } ?>>Services</a>
                        <a class="nav-item nav-link" aria-current="page" href="team.php" <?php if ($currentpage === "team.php") { ?> style="color:red" <?php } ?>>Event</a>
                        <a class="nav-item nav-link" aria-current="page" href="about.php" <?php if ($currentpage === "about.php") { ?> style="color:red" <?php } ?>>About</a>
                        <a class="nav-item nav-link" aria-current="page" href="contact.php" <?php if ($currentpage === "contact.php") { ?> style="color:red" <?php } ?>>Contact</a>

                        <!-- <a href="service.php" class="nav-item nav-link">Services</a> -->
                        <!-- <a href="team.php" class="nav-item nav-link">Event</a> -->
                        <!-- <a href="book.php" class="nav-item nav-link">Book</a> -->
                        <!-- <div class="nav-item dropdown">
                            <a href="book.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">BOOK</a>
                            <div class="dropdown-menu m-0">
                                <a href="appointment.php" class="dropdown-item">BOOK</a>
                            </div>
                        </div> -->

                        <!-- <a href="about.php" class="nav-item nav-link">About</a> -->
                        <!-- <a href="contact.php" class="nav-item nav-link">Contact</a> -->

                        <?php
                        session_start();
                        if (isset($_SESSION['username'])) {
                            echo '<a href="logout_user.php" class="nav-item nav-link">
            <button class="btn  my-2 my-sm-0 ">
              <span>Logout</span>
            </button>
          </a>';
                        } else {
                            echo '<a href="login_user.php" class="nav-item nav-link">
            <button class="btn  my-2 my-sm-0 g-4 ">
              <span>Login</span>
            </button>
          </a>
          <a href="register_user.php" class="nav-item nav-link" style="margin-left: 10px;">
            <button class="btn  my-2 my-sm-0 " >
              <span>register</span>
            </button>
            
          </a>';
                        }
                        ?>

                        <!-- <a href="login-08.html#" data-panel=".panel-signup" class="nav-item nav-link">
                                <button class="btn  my-2 my-sm-0 ">
                              <i class="fa fa-user" aria-hidden="true"></i>
                              <span>
                                Sign Up
                              </span>
                              </button>
                            </a>-->
                        <!-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu mb-2">
                                <input class="form-control dropdown-item w-100 " type="search" placeholder="Search"
                                    aria-label="Search">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-dark border-0 my-2 w-100">Search</button>
                            </div>
                        </div> -->
                        <li class="nav-item dropdown">



                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                            <?php
                            // Check if the user is logged in
                            if (isset($_SESSION['username'])) {
                                // Retrieve user's profile image from the database
                                $select = "SELECT * FROM `ev_users` WHERE email = ?";
                                $stmt = $cn->prepare($select);
                                $stmt->bind_param("s", $_SESSION['email']);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    $profile_image = $row['image'];

                                    // Check if profile image exists
                                    if (!empty($profile_image)) {
                                        echo '<img src="' . $profile_image . '"  alt="Profile Image" class="rounded-circle" style="    max-width: 40px;">';
                                    } else {
                                        echo '<img src="uploaded_img/default-avatar.png" alt="Profile Image"  class="rounded-circle" style="    max-width: 40px;">';
                                    }
                                } else {
                                    echo '<img src="uploaded_img/default-avatar.png" alt="Profile Image"  class="rounded-circle" style="    max-width: 40px;">';
                                }
                            } else {
                                echo '<img src="uploaded_img/default-avatar.png" alt="Profile Image"  class="rounded-circle" style="    max-width: 40px;">';
                            }
                            ?>
                        </a>
<!-- End Profile Image Icon -->

                            <!-- <img src="extra work/NiceAdmin/assets/img/profile-img.jpg" alt="Profile"
    class="rounded-circle" style="    max-width: 40px;"> -->
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                                <li class="dropdown-header">
                                    <h6>
                                        <?php
                                        if (isset($_SESSION['username'])) {
                                            // If logged in, display the username
                                            echo '<p>' . $_SESSION['username'] . '</p>';
                                        } ?>
                                    </h6>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="user_profile.php">
                                        <i class="bi bi-person"></i>
                                        <span>My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                                        <i class="bi bi-gear"></i>
                                        <span>Account Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="book.php">
                                        <i class="bi bi-question-circle"></i>
                                        <span>My Bookings</span>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="">
                                        <i class="bi bi-box-arrow-right"></i>
                                        <span>Sign Out</span>
                                    </a>
                                </li>

                            </ul><!-- End Profile Dropdown Items -->
                        </li><!-- End Profile Nav -->

                    </div>
                </div>
            </nav>
        </div>
    </div> <!-- Navbar End -->
</body>

</html>