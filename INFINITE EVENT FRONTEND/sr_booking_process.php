<?php
$cn = mysqli_connect("localhost", "root", "", "infinite_event");
session_start();




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
                      <input type="hidden" name="id" id="formCardNumber" class="form-control" value="<?=  $_POST['id'] ?? '';  ?>"/>
                      <input type="hidden" name="name" id="formCardNumber" class="form-control" value="<?=  $_POST['name'] ?? '';  ?>"/>
                      <input type="hidden" name="address" id="formCardNumber" class="form-control" value="<?=  $_POST['address'] ?? '';  ?>"/>
                      <input type="hidden" name="email" id="formCardNumber" class="form-control" value="<?=  $_POST['email'] ?? '';  ?>"/>
                      <input type="hidden" name="phone" id="formCardNumber" class="form-control" value="<?=  $_POST['phone'] ?? '';  ?>"/>
                      <input type="hidden" name="sr_name" id="formCardNumber" class="form-control" value="<?=  $_POST['sr_name'] ?? '';  ?>"/>
                      <input type="hidden" name="sr_date" id="formCardNumber" class="form-control" value="<?=  $_POST['sr_date'] ?? '';  ?>"/>
                      <input type="hidden" name="price" id="formCardNumber" class="form-control" value="<?=  $_POST['price'] ?? '';  ?>"/>
                      <input type="hidden" name="add_info" id="formCardNumber" class="form-control" value="<?=  $_POST['add_info'] ?? '';  ?>"/>
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
            </form>
          </div>
        </div>
      </div >

      <div class="col-md-4 mb-4">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0">Summary</h5>
          </div>
          <div class="card-body">

            <?php
            // $id = $_GET['id'];
            // $select = "SELECT * FROM ev_services WHERE id=$id";
            // $xc = mysqli_query($cn, $select);
            // $rw = mysqli_num_rows($xc);
            // $data = mysqli_fetch_assoc($xc);

            ?>

            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                Service Name
                <?php 
                       $tp=$_POST['sr_name'];
                       $ep=$_POST['price'];
                      
                ?>
                <span><?php  echo $tp ; ?></span>
                <li class="list-group-item d-flex justify-content-between align-items-center px-0 pb-0">
                Service Price
                <span><?php  echo $ep ; ?></span>
              <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                <div>
                  <strong>Total amount</strong>
                  <strong>
                    <p class="mb-0">(including GST)</p>
                  </strong>
                </div>
                <span><strong><?php  echo $ep ; ?>.00</strong></span>
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


<?php 
 

if(isset($_POST['pay'])){
  $payername=$_POST['payer_name'];
  $pemail=$_POST['p_email'];
  $cnumber=$_POST['card_number'];
  $expdate=$_POST['expity_date'];
  $cvv=$_POST['cvv_code'];
  

  
 //$tamount=$_POST['t_amount'];
 //query for payment table

 
 $eid= $_POST['id'];
 $name=$_POST['name'];
 $add=$_POST['address'];
 $em=$_POST['email'];
 $mb=$_POST['phone'];
 $evd=$_POST['sr_name'];
 $nevd=$_POST['sr_date'];
 $price=$_POST['price'];
 $info=$_POST['add_info'];



  $ins = "INSERT INTO sr_payment values(p_id,'$payername','$pemail','$cnumber','$expdate','$cvv',$ep)";
   $exc1 = mysqli_query($cn, $ins);
   if($exc1){
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


 $insert = "INSERT INTO `sr_booking`(`id`,`name`, `address`, `email`, `phone`, `sr_name`, `sr_date`,`price`, `add_info`) VALUES ($eid,'$name','$add','$em','$mb','$evd','$nevd','$price','$info')";
   $exc = mysqli_query($cn, $insert);
   
  
}
else{
 // payment failed
 
}
  ?>