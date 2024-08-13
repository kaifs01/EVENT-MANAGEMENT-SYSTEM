<?php
include "db/cn.php";
$name = $email = $pwd = $conf_pwd = $phone = "";
$name_err = $email_err = $pwd_err = $conf_pwd_err = $phone_err = $image_err = "";
$error = false;
$succ_msg = $error_msg = "";

if (isset($_POST['add'])) {

    $name = trim($_POST['username']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $pwd = trim($_POST['pwd']);
    $conf_pwd = trim($_POST['conf_pwd']);
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/' . $image;

    // validate fields
    if ($name == "") {
        $name_err = "Name is mandatory";
        $error = true;
    }

    if ($email == "") {
        $email_err = "Email is mandatory";
        $error = true;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid Email format";
        $error = true;
    } else {   // check if email already registered
        $sql = "SELECT * FROM ev_users WHERE email = ?";
        $stmt = $cn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $email_err = "Email already registered";
            $error = true;
        }
    }

    if ($pwd == "") {
        $pwd_err = "Password is mandatory";
        $error = true;
    } elseif (strlen($pwd) < 6) {
        $pwd_err = "Password must be at least 6 characters";
        $error = true;
    }

    if ($conf_pwd == "") {
        $conf_pwd_err = "Confirm Password is mandatory";
        $error = true;
    }

    if ($pwd != "" && $conf_pwd != "") {
        if ($pwd != $conf_pwd) {
            $conf_pwd_err = "Passwords do not match";
            $error = true;
        }
    }

    if ($phone == "") {
        $phone_err = "Phone number is mandatory";
        $error = true;
    }

    if ($image == "") {
        $image_err = "Image is mandatory";
        $error = true;
    } elseif (!getimagesize($image_tmp_name)) {
        $image_err = "Invalid image format";
        $error = true;
    }

    // all validations passed
    if (!$error) {
        // Upload image to server
        move_uploaded_file($image_tmp_name, $image_folder);

        $pwd = password_hash($pwd, PASSWORD_DEFAULT);

        $sql = "INSERT INTO ev_users (username, phone, email, password, image) VALUES (?, ?, ?, ?, ?)";
        try {
            $stmt = $cn->prepare($sql);
            $stmt->bind_param("sssss", $name, $phone, $email, $pwd, $image_folder);
            $stmt->execute();
            $succ_msg = "Registration successful. Please <a href='login_user.php'>login</a>";
            $name = $email = "";
        } catch (Exception $e) {
            $error_msg = $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Register -HarMony Events Bootstrap Template</title>
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
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="css/style1.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name:HarMony Events
  * Updated: Aug 30 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    ::-webkit-scrollbar {
      width: 0px;
    }
  </style>
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <?php if (!empty($succ_msg)) { ?>
                <div class="alert alert-success">
                  <?= $succ_msg ?>
                </div>
              <?php } ?>

              <?php if (!empty($error_msg)) { ?>
                <div class="alert alert-danger">
                  <?= $error_msg ?>
                </div>
              <?php } ?>
              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Infinite Impress Events</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form method="post" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate
                    style="overflow-y: scroll; height: 360px;">
                    <div class="col-12">
                      <label for="youruserName" class="form-label">Name</label>
                      <input type="text" name="username" class="form-control" id="youruserName" value="<?= $name ?>"
                        required>
                      <div class="input-err text-danger">
                        <?= $name_err ?>
                      </div>
                      <!-- <div class="invalid-feedback">Please, enter User name!</div> -->
                    </div>

                    <div class="col-12">
                      <label for="yourphone" class="form-label">Mobile Number</label>
                      <input type="text" name="phone" class="form-control" id="yourphone" required>
                      <div class="invalid-feedback">Please, enter mobile number</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" class="form-control" id="yourEmail" value="<?= $email ?>"
                          required>
                        <div class="input-err text-danger">
                          <?= $email_err ?>
                        </div>

                        <!-- <div class="invalid-feedback">Please enter a valid Email adddress!</div> -->
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="pwd" class="form-control" id="yourPassword" required>
                      <div class="input-err text-danger">
                        <?= $pwd_err ?>
                      </div>
                      <!-- <div class="invalid-feedback">Please enter your password!</div> -->
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Confirm Password</label>
                      <input type="password" name="conf_pwd" class="form-control" id="yourPassword" required>
                      <div class="input-err text-danger">
                        <?= $pwd_err ?>
                      </div>
                      <!-- <div class="invalid-feedback">Please enter your password!</div> -->
                    </div>
                    <div class="col-12">
                      <label for="yourImage" class="form-label">Profile Image</label>
                      <input type="file" name="image" class="form-control" id="yourImage" required>
                      <div class="input-err text-danger">
                        <?= $image_err ?>
                      </div>
                    </div>

                    <!-- <div class="col-12">
                      <label for="yourprofile" class="form-label">Profile Image</label>
                      <input type="file" name="profile" class="form-control" id="yourprofile" required>
                      <div class="invalid-feedback">Please Choose your Profile !</div>
                    </div> -->




                    <!-- <div class="col-12">
                      <label for="yourprofile" class="form-label">Profile Image</label>
                      <input type="file" name="profile" class="form-control" id="yourprofile" required>
                       Add an <img> tag to display the image preview 
                      <img id="imagePreview" src="#" alt="Profile Image Preview"
                        style="max-width: 75px; margin-top: 10px; display: none; border-radius: 40px">
                      <div class="invalid-feedback">Please choose your Profile!</div>
                    </div> -->




                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and
                            conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" name="add" type="submit">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="login_user.php">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>





  <script>
    function showPwd() {
      var pwd = document.getElementById("pwd");
      var conf_pwd = document.getElementById("conf_pwd");
      if (pwd.type === "password")
        pwd.type = "text";
      else
        pwd.type = "password"

      if (conf_pwd.type === "password")
        conf_pwd.type = "text";
      else
        conf_pwd.type = "password"
    }
  </script>

  <script>
    // JavaScript to display image preview
    document.getElementById("yourprofile").addEventListener("change", function (event) {
      var file = event.target.files[0];
      var imageType = /image.*/;

      if (file.type.match(imageType)) {
        var reader = new FileReader();

        reader.onload = function (e) {
          var imagePreview = document.getElementById("imagePreview");
          imagePreview.src = reader.result;
          imagePreview.style.display = "block"; // Show the image preview
        }

        reader.readAsDataURL(file);
      } else {
        alert("File not supported. Please upload an image file.");
      }
    });
  </script>










  <!-- Vendor JS Files -->
  <script src="vendor/apexcharts/apexcharts.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/chart.js/chart.umd.js"></script>
  <script src="vendor/echarts/echarts.min.js"></script>
  <script src="vendor/quill/quill.min.js"></script>
  <script src="vendor/simple-datatables/simple-datatables.js"></script>
  <script src="vendor/tinymce/tinymce.min.js"></script>
  <script src="vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>