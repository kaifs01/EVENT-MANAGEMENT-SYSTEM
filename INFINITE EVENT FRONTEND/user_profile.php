<?php
include "db/cn.php";
if (!isset($_SESSION) || session_id() == "" || session_status() === PHP_SESSION_NONE)
    session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $target_dir = "uploaded_img/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["file"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            // Update the database with the new profile image
            $query = "UPDATE ev_users SET image = ? WHERE email = ?";
            $stmt = $cn->prepare($query);
            $stmt->bind_param("ss", $target_file, $_SESSION['email']);
            $stmt->execute();
            $stmt->close();
            // Redirect to the same page to reflect changes
            header("Location: user_profile.php");
            exit();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</head>

<style>
    body {
        background: -webkit-linear-gradient(left, #ee8425, #f9488b);
    }

    .emp-profile {
        padding: 3%;
        margin-top: 3%;
        margin-bottom: 3%;
        border-radius: 0.5rem;
        background: #fff;
    }

    .profile-img {
        text-align: center;
    }

    .profile-img img {
        width: 50%;
        height: 100%;
        border-radius: 100px;
    }

    .profile-img .file {
        position: relative;
        overflow: hidden;
        margin-top: -20%;
        width: 70%;
        border: none;
        border-radius: 0;
        font-size: 15px;
        background: #212529b8;
    }

    .profile-img .file input {
        position: absolute;
        opacity: 0;
        right: 0;
        top: 0;
    }

    .profile-head h5 {
        color: #333;
    }

    .profile-head h6 {
        color: #0062cc;
    }

    .profile-edit-btn {
        border: none;
        border-radius: 1.5rem;
        width: 70%;
        padding: 2%;
        font-weight: 600;
        color: #6c757d;
        cursor: pointer;
    }

    .proile-rating {
        font-size: 12px;
        color: #818182;
        margin-top: 5%;
    }

    .proile-rating span {
        color: #495057;
        font-size: 15px;
        font-weight: 600;
    }

    .profile-head .nav-tabs {
        margin-bottom: 5%;
    }

    .profile-head .nav-tabs .nav-link {
        font-weight: 600;
        border: none;
    }

    .profile-head .nav-tabs .nav-link.active {
        border: none;
        border-bottom: 2px solid #0062cc;
    }

    .profile-work {
        padding: 14%;
        margin-top: -15%;
    }

    .profile-work p {
        font-size: 12px;
        color: #818182;
        font-weight: 600;
        margin-top: 10%;
    }

    .profile-work a {
        text-decoration: none;
        color: #495057;
        font-weight: 600;
        font-size: 14px;
    }

    .profile-work ul {
        list-style: none;
    }

    .profile-tab label {
        font-weight: 600;
    }

    .profile-tab p {
        font-weight: 600;
        color: #0062cc;
    }

    .profile-tab {
        margin-left: 50%;
    }
</style>

<body>
    <?php
    @include 'header.php';
    ?>



    <div class="container emp-profile">
        <form method="post">
            <div class="row">
                <!-- <div class="col-md-4">
                    <div class="profile-img">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog"
                            alt="" />
                        <div class="file btn btn-lg btn-primary">
                            Change Photo
                            <input type="file" name="file" /> -->

                <!-- Add an <img> tag to display the image preview -->
                <!-- 
                        </div>
                    </div>
                </div> -->

                <div class="col-md-4">
                    <div class="profile-img">
                        <?php if (isset($profile_image)) { ?>
                            <img src="<?php echo $profile_image; ?>" alt="Profile Image" />
                        <?php } else { ?>
                            <img src="uploaded_img/default-avatar.png" alt="Avatar" />
                        <?php } ?>
                        <!-- <div class="file btn btn-lg btn-primary">
                            Change Photo
                            <input type="file" name="file" id="imageUpload" />
                        </div> -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            <?php
                            if (isset($_SESSION['username'])) {
                                // If logged in, display the username
                                echo '<p>' . $_SESSION['username'] . '</p>';
                            } ?>
                        </h5>
                        <h6>
                            <?php
                            if (isset($_SESSION['email'])) {
                                // If logged in, display the username
                                echo '<p>' . $_SESSION['email'] . '</p>';
                            } ?>
                        </h6>
                        <!-- <p class="proile-rating">RANKINGS : <span>8/10</span></p> -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">About</a>
                            </li>
                            <li class="nav-item">

                            </li>
                        </ul>
                    </div>
                </div>
                <!-- <div class="col-md-2">
                    <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile" />
                </div> -->

                <!-- <div class="row" style="margin-left: 30px;"> -->
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <?php
                                        if (isset($_SESSION['username'])) {
                                            // If logged in, display the username
                                            echo '<p>' . $_SESSION['username'] . '</p>';
                                        } ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <?php if (isset($_SESSION['email'])) {
                                            // If logged in, display the username
                                            echo '<p>' . $_SESSION['email'] . '</p>';
                                        } ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <?php
                                        if (isset($_SESSION['phone'])) {
                                            // If logged in, display the username
                                            echo '<p>' . $_SESSION['phone'] . '</p>';
                                        } ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Profession</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Web Developer and Designer</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Experience</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Expert</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Hourly Rate</label>
                                </div>
                                <div class="col-md-6">
                                    <p>10$/hr</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Total Projects</label>
                                </div>
                                <div class="col-md-6">
                                    <p>230</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>English Level</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Expert</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Availability</label>
                                </div>
                                <div class="col-md-6">
                                    <p>6 months</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Your Bio</label><br />
                                    <p>Your detail description</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </div> -->
        </form>
    </div>
</body>



<!-- Rest of your form -->

<script>
    // JavaScript to display image preview
    document.getElementById("imageUpload").addEventListener("change", function (event) {
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

</html>