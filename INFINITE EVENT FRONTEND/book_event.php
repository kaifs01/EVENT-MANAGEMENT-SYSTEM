<?php
include ("db/cn.php");
ob_start();

if (!session_id()) {
  session_start();


  if (empty($_SESSION['username'])) {
    // Set the alert message
    $_SESSION['alert'] = 'You need to login to access this page.';
    header("Location: register_user.php");
    exit;
  }

}
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
  <link rel="stylesheet" href="style.css">
</head>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');


  .container1 {
    max-width: 700px;
    width: 100%;
    background-color: #fff;
    padding: 27px 30px 0px 30px;
    border-radius: 5px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
  }

  /*    
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }
*/
  section {
    height: 85vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px;

  }

  .container1 .title {
    font-size: 25px;
    font-weight: 500;
    position: relative;
  }

  .container1 .title::before {
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    height: 3px;
    width: 30px;
    border-radius: 5px;
    background: linear-gradient(135deg, #71b7e6, #9b59b6);
  }

  .content form .user-details {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 20px 0 12px 0;
  }

  form .user-details .input-box {
    margin-bottom: 15px;
    width: calc(100% / 2 - 20px);
  }

  form .input-box span.details {
    display: block;
    font-weight: 500;
    margin-bottom: 5px;
  }

  .user-details .input-box input {
    height: 45px;
    width: 100%;
    outline: none;
    font-size: 16px;
    border-radius: 5px;
    padding-left: 15px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
  }

  .user-details .input-box input:focus,
  .user-details .input-box input:valid {
    border-color: #9b59b6;
  }

  form .gender-details .gender-title {
    font-size: 20px;
    font-weight: 500;
  }

  form .category {
    display: flex;
    width: 80%;
    margin: 14px 0;
    justify-content: space-between;
  }

  form .category label {
    display: flex;
    align-items: center;
    cursor: pointer;
  }

  form .category label .dot {
    height: 18px;
    width: 18px;
    border-radius: 50%;
    margin-right: 10px;
    background: #d9d9d9;
    border: 5px solid transparent;
    transition: all 0.3s ease;
  }

  #dot-1:checked~.category label .one,
  #dot-2:checked~.category label .two,
  #dot-3:checked~.category label .three {
    background: #9b59b6;
    border-color: #d9d9d9;
  }

  form input[type="radio"] {
    display: none;
  }

  form .button {
    height: 45px;
    margin: 35px 0
  }

  form .button input {
    height: 100%;
    width: 100%;
    border-radius: 5px;
    border: none;
    color: #fff;
    font-size: 18px;
    font-weight: 500;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.3s ease;
    /* background: linear-gradient(135deg, #71b7e6, #9b59b6); */
    background-image: linear-gradient(to right, #ee8425 0%, #f9488b 100%), linear-gradient(to right, #ee8425 0%, #f9488b 100%);
  }

  form .button input:hover {
    /* transform: scale(0.99); */
    background: linear-gradient(-135deg, #71b7e6, #9b59b6);
  }

  @media(max-width: 584px) {
    .container1 {
      max-width: 100%;
    }

    form .user-details .input-box {
      margin-bottom: 15px;
      width: 100%;
    }

    form .category {
      width: 100%;
    }

    .content form .user-details {
      max-height: 300px;
      overflow-y: scroll;
    }

    .user-details::-webkit-scrollbar {
      width: 5px;
    }
  }

  @media(max-width: 459px) {
    .container .content .category {
      flex-direction: column;
    }
  }
</style>

<body>
  <?php
  @include 'header.php';
  ?>

  <section>

    <div class="container1">
      <div class="title">Book Event</div>
      <div class="content">


        <?php
        $tid = $_GET['th_id'];
        //$select="SELECT * FROM themes left join events on themes.event_id=events.e_id WHERE event_id=$id";
        $select1 = "SELECT * FROM themes where theme_id=$tid";
        $xc1 = mysqli_query($cn, $select1);
        $rw1 = mysqli_num_rows($xc1);
        $data1 = mysqli_fetch_assoc($xc1);


        ?>
        <!-- data fetch from bookings table -->
        <?php
        $id = $_GET['event_id'];
        $select = "SELECT * FROM events WHERE e_id=$id";
        $xc = mysqli_query($cn, $select);
        $rw = mysqli_num_rows($xc);
        $data = mysqli_fetch_assoc($xc); ?>
        <!-- end  -->

        <form action="payment.php" method="post">
          <div class="user-details">
            <div class="input-box">
              <span class="details">Full Name</span>
              <input type="text" placeholder="Enter your name" name="name" value="<?php echo $_SESSION['username'] ?>"
                required>
            </div>
            <div class="input-box">
              <span class="details">Address</span>
              <input type="text" placeholder="Enter your Address" name="address" required>
            </div>
            <div class="input-box">
              <span class="details">Email</span>
              <input type="text" placeholder="Enter your email" name="email" value="<?php echo $_SESSION['email'] ?>"
                required>
            </div>
            <div class="input-box">
              <span class="details">Phone Number</span>
              <input type="text" placeholder="Enter your number" name="mobno" value="<?php echo $_SESSION['phone'] ?>"
                required>
            </div>
            <div class="input-box">
              <span class="details">Event date</span>
              <input type="date" id="date-input1" placeholder="" name="ev_date" min="" required>
            </div>
            <div class="input-box">
              <span class="details">Event End date</span>
              <input type="date" id="date-input2" placeholder="" name="end_ev_date" min="" required>
            </div>
            <div class="input-box">
              <span class="details">Event Name</span>
              <input type="text" placeholder="enter event name" value="<?php echo $data['e_name'] ?>" required disabled>
              <input type="hidden" placeholder="enter event name" name="ev_type" value="<?php echo $data['e_name'] ?>"
                required>
              <!-- event id -->
              <input type="hidden" name="e_id" value="<?php echo $data['e_id'] ?>" required>
              <!-- theme id -->
              <input type="hidden" name="t_id" value="<?php echo $data1['theme_id'] ?>" required>
            </div>
            <div class="input-box">
              <span class="details">Theme Name</span>
              <input type="text" placeholder="name of theme" value="<?php echo $data1['name'] ?>" required disabled>
              <input type="hidden" placeholder="name of theme" name="theme" value="<?php echo $data1['name'] ?>"
                required>
            </div>
            <div class="input-box">
              <span class="details">Event Price</span>
              <input type="text" placeholder="Enter Price" value="<?php echo $data['price'] ?>" required disabled>
              <input type="hidden" placeholder="Enter Price" name="price" value="<?php echo $data['price']; ?>"
                required>
            </div>
            <div class="input-box">
              <span class="details">Theme Price</span>
              <input type="text" placeholder="Enter Price" value="<?php echo $data1['t_price'] ?>" required disabled>
              <input type="hidden" placeholder="Enter Price" name="t_price" value="<?php echo $data1['t_price'] ?>"
                required>
            </div>
            <div class="input-box">
              <span class="details">Addtional Infomation</span>
              <input type="text" placeholder="Enter Addtional Infomation (optional)" name="add_info"
                style="width: 213%;">
            </div>
          </div>
          <div class="button">
            <input type="submit" name="add" value="Book Your Event">
          </div>
        </form>

      </div>
    </div>
  </section>
  <script>
    // Get the input elements
    var startDateInput = document.getElementById('date-input1');
    var endDateInput = document.getElementById('date-input2');

    // Add event listener to start date input
    startDateInput.addEventListener('input', function() {
        // Set minimum value for end date input
        endDateInput.min = startDateInput.value;
        
        // Check if end date is before start date, then reset it
        if (endDateInput.value < startDateInput.value) {
            endDateInput.value = startDateInput.value;
        }
    });

    // Add event listener to end date input
    endDateInput.addEventListener('input', function() {
        // Check if end date is before start date, then reset it
        if (endDateInput.value < startDateInput.value) {
            endDateInput.value = startDateInput.value;
        }
    });
</script>
  <script>

    var today = new Date().toISOString().split('T')[0];
    document.getElementById("date-input1").setAttribute("min", today);
    document.getElementById("date-input2").setAttribute("min", today);

  </script>

</body>

</html>


<?php


?>