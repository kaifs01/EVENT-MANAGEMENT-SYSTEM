<?php
$cn = mysqli_connect("localhost", "root", "", "infinite_event");


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>CodePen - Glassmorphism login Form Tutorial in html css</title>


</head>

<body>
  <!-- partial:index.partial.html -->
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <!-- Design by foolishdeveloper.com -->
    <title>Glassmorphism login Form Tutorial in html css</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
      *,
      *:before,
      *:after {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
      }

      .background {
        width: 430px;
        height: 520px;
        position: absolute;
        transform: translate(-50%, -50%);
        left: 50%;
        top: 50%;
      }

      .add_ev {
        overflow-y: scroll;
        height: 520px;
        width: 400px;
        background-color: #f6f9ff;
        position: absolute;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
        border-radius: 10px;
        /* backdrop-filter: blur(10px); */
        border: 2px solid rgba(255, 255, 255, 0.1);
        box-shadow: 20px 20px 60px #00000041, inset -20px -20px 60px #ffffff40;
        padding: 50px 35px;
      }

      .add_ev * {
        font-family: 'Poppins', sans-serif;
        letter-spacing: 0.5px;
        outline: none;
        border: none;
      }

      form h3 {
        font-size: 32px;
        font-weight: 500;
        line-height: 42px;
        text-align: center;
        color: #929aa8z;
      }

      label {
        display: block;
        margin-top: 30px;
        font-size: 16px;
        font-weight: 500;
        color: #929aa8;
      }

      .evd {
        display: block;
        height: 50px;
        width: 100%;
        background-color: #f6f9ff;
        box-shadow: 16px 15px 18px #00000041, inset 5px 7px 10px #00000040;
        border-radius: 40px;
        padding: 0 10px;
        margin-top: 8px;
        font-size: 14px;
        font-weight: 300;
      }

      .evd1 {
        display: block;
        height: 70px;
        width: 100%;
        background-color: #f6f9ff;
        box-shadow: 16px 15px 18px #00000041, inset 5px 7px 10px #00000040;
        border-radius: 40px;
        padding: 11px 10px;
        margin-top: 8px;
        font-size: 14px;
        font-weight: 300;
      }

      .evd1::-webkit-file-upload-button {
        background: #f6f9ff;
        color: #929aa8;
        border-radius: 50px;
        border: none;
        height: 50px;
        width: 100px;
        box-shadow: inset 2px 2px 7px 4px #00000040;
        20px 20px 60px #00000041,
        inset 2px -3px 10px 3px #00000040
      }

      ::placeholder {
        color: #929aa8;
      }

      .ev_btn {
        margin-top: 50px;
        width: 100%;
        background-color: #f6f9ff;
        box-shadow: 16px 15px 18px #00000041, 5px 7px 10px #00000040;
        color: #080710;
        padding: 15px 0;
        font-size: 18px;
        font-weight: 600;
        border-radius: 40px;
        cursor: pointer;
      }


      /* Center the image and position the close button */


      .close {
        position: fixed;
        right: 10px;
        top: 0;
        color: #000;
        font-size: 35px;
        font-weight: bold;
      }

      .close:hover,
      .close:focus {
        color: red;
        cursor: pointer;
      }

      /* width */
      ::-webkit-scrollbar {
        width: 0px;
      }



      /* Add Zoom Animation */
      /* .animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
} */




      /* The Modal (background) */
    </style>
  </head>

  <body>

    <div id="id01" class="add_ev ">
      <form method="POST" enctype="multipart/form-data">

        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

        <h3>Add Top Event</h3>

        <label>Image</label>
        <input class="evd1" type="file" id="eventImage" name="preview">

        <label>Event Name</label>
        <input class="evd" type="text" name="ev_name" placeholder="Enter Event Name" value="<?PHP if (isset($_GET['edit'])) echo $row['e_name']; ?>">

        <label>Price</label>
        <input class="evd" type="text" placeholder="Enter Price" name="price" value="<?PHP if (isset($_GET['edit'])) echo $row['short_dis']; ?>">

        <label>Booking</label>
        <input class="evd" type="text" placeholder="Enter Booking" name="booking" value="<?PHP if (isset($_GET['edit'])) echo $row['disc']; ?>">


        <?PHP if (isset($_GET['edit'])) { ?>
          <button type="submit" name="update" class="ev_btn">update</button>
        <?PHP } else { ?>
          <button type="submit" name="add" class="ev_btn">Submit</button>
        <?PHP } ?>
      </form>
    </div>


    <script>
      // Get the modal
      var modal = document.getElementById('id01');

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      }
    </script>
  </body>

  </html>
  <!-- partial -->

</body>

</html>