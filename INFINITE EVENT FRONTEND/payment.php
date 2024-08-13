<?php
$cn = mysqli_connect("localhost", "root", "", "infinite_event");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment</title>
  <!-- <link rel="shortcut icon" type="image/x-icon" href="assets/images/milk_boy.png"> -->
  <!-- alert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="css/mdb.min.css" />
  <style>
    .row {
      display: inline-flex;
    }
  </style>
</head>

<body>
  <!-- Credit card form -->
  <section style="padding-left: 290px; padding-top: 100px;">
    <div class="row">
      <div class="col-md-6 mb-4">
        <div class="card mb-4">
          <div class="card-body">
            <h5 class="mb-0">Payment</h5>
            <hr class="my-2">
            <form action="" method="post">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="checkoutForm3" disabled />
                <label class="form-check-label" for="checkoutForm3">
                  Credit card
                </label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="checkoutForm4" checked />
                <label class="form-check-label" for="checkoutForm4">
                  Debit card
                </label>
              </div>

              <div class="form-check mb-4">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="checkoutForm5" disabled />
                <label class="form-check-label" for="checkoutForm5">
                  Paypal
                </label>
              </div>

              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input type="text" name="payer_name" id="formNameOnCard" class="form-control" />
                    <label class="form-label" for="formNameOnCard">Name on card</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <input type="email" name="p_email" id="formEmail" class="form-control" />
                    <label class="form-label" for="formEmail">Email</label>
                  </div>
                </div>
              </div>
              <!-- all hidden fields -->
              <input type="hidden" name="name" id="formCardNumber" class="form-control"
                value="<?= $_POST['name'] ?? ''; ?>" />
              <input type="hidden" name="mobno" id="formCardNumber" class="form-control"
                value="<?= $_POST['mobno'] ?? ''; ?>" />
              <input type="hidden" name="email" id="formCardNumber" class="form-control"
                value="<?= $_POST['email'] ?? ''; ?>" />
              <input type="hidden" name="address" id="formCardNumber" class="form-control"
                value="<?= $_POST['address'] ?? ''; ?>" />
              <input type="hidden" name="ev_date" id="formCardNumber" class="form-control"
                value="<?= $_POST['ev_date'] ?? ''; ?>" />
              <input type="hidden" name="end_ev_date" id="formCardNumber" class="form-control"
                value="<?= $_POST['end_ev_date'] ?? ''; ?>" />
              <input type="hidden" name="ev_type" id="formCardNumber" class="form-control"
                value="<?= $_POST['ev_type'] ?? ''; ?>" />
              <input type="hidden" name="theme" id="formCardNumber" class="form-control"
                value="<?= $_POST['theme'] ?? ''; ?>" />
              <input type="hidden" name="e_id" id="formCardNumber" class="form-control"
                value="<?= $_POST['e_id'] ?? ''; ?>" />
              <input type="hidden" name="t_id" id="formCardNumber" class="form-control"
                value="<?= $_POST['t_id'] ?? ''; ?>" />
              <input type="hidden" name="price" id="formCardNumber" class="form-control"
                value="<?= $_POST['price'] ?? ''; ?>" />
              <input type="hidden" name="t_price" id="formCardNumber" class="form-control"
                value="<?= $_POST['t_price'] ?? ''; ?>" />
              <input type="hidden" name="add_info" id="formCardNumber" class="form-control"
                value="<?= $_POST['add_info'] ?? ''; ?>" />
              <!-- end -->
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input type="text" name="card_number" id="formCardNumber" class="form-control" />

                    <label class="form-label" for="formCardNumber">Debit card number</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <input type="date" name="expity_date" id="formExpiration" class="form-control" />
                    <label class="form-label" for="formExpiration">Expiray Date</label>
                  </div>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input type="text" name="cvv_code" id="formCVV" class="form-control" />
                    <label class="form-label" for="formCVV">CVV</label>
                  </div>
                </div>
              </div>
              <input type="submit" name="pay" class="btn btn-primary btn-lg btn-block" value="Proceed To Pay">
              <!-- <input type="submit" class="btn btn-primary btn-lg btn-block" value="Proceed" onclick="window.alert('sometext')"> -->
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0">Summary</h5>
          </div>
          <div class="card-body">

            <?php
            // $id = $_GET['event_id'];
            // $select = "SELECT * FROM themes left join events on themes.event_id=events.e_id WHERE event_id=$id";
            // $xc = mysqli_query($cn, $select);
            // $rw = mysqli_num_rows($xc);
            // $data = mysqli_fetch_assoc($xc);
            
            ?>

            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                Event Price (in Rs.)
                <?php $ep = $_POST['price'];
                $tp = $_POST['t_price'];
                $total = $ep + $tp;
                ?>
                <span>
                  <?php echo $ep; ?>.00
                </span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                Theme Price (in Rs.)
                <span>
                  <?php echo $tp; ?>.00
                </span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                <div>
                  <strong>Total amount</strong>
                  <strong>
                    <p class="mb-0">(including GST)</p>
                  </strong>
                </div>
                <span><strong>
                    <?php echo $total; ?>.00
                  </strong></span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Credit card form -->
  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>
</body>

</html>

<!-- data insert into booking table -->
<?php


if (isset($_POST['pay'])) {
  $payername = $_POST['payer_name'];
  $pemail = $_POST['p_email'];
  $cnumber = $_POST['card_number'];
  $expdate = $_POST['expity_date'];
  $cvv = $_POST['cvv_code'];



  //$tamount=$_POST['t_amount'];
  //query for payment table


  $eid = $_POST['e_id'];
  $tid = $_POST['t_id'];
  //  $them=$_POST['theme'];
  $name = $_POST['name'];
  $mb = $_POST['mobno'];
  $em = $_POST['email'];
  $add = $_POST['address'];
  $evd = $_POST['ev_date'];
  $nevd = $_POST['end_ev_date'];
  $evt = $_POST['ev_type'];
  $price = $_POST['price'];
  $info = $_POST['add_info'];



  $ins = "INSERT INTO payment values(p_id,'$payername','$pemail','$cnumber','$expdate','$cvv',$total,payment_date)";
  $exc1 = mysqli_query($cn, $ins);
  if ($exc1) {
    echo '<script type="text/javascript">
    swal({
        title: "Payment Successfully",

        icon: "success",
        button: "OK",

    }).then(function() {
        window.location.href = "book.php";
        });
    </script>';
  }


  $insert = "INSERT INTO `bookings`(`eb_id`,`theme_id`,`c_name`, `mobno`, `email`, `address`, `ev_date`, `end_ev_date`, `ev_type`,`price`, `add_info`) VALUES ($eid,$tid,'$name','$mb','$em','$add','$evd','$nevd','$evt','$price','$info')";
  $exc = mysqli_query($cn, $insert);
 

} else {
  // payment failed

}
?>

<!-- end -->