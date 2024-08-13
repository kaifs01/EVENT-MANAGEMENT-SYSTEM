<?php 
$cn = mysqli_connect("localhost", "root", "", "infinite_event");

 if(isset($_POST['add'])){
 $name = $_POST['name'];
 $mb = $_POST['mobno'];
 $em = $_POST['email'];
 $add = $_POST['address'];
 $evd = $_POST['ev_date'];
 $nevd = $_POST['end_ev_date'];
 $evt = $_POST['ev_type'];
 $the = $_POST['theme'];
 $price = $_POST['price'];
 $tprice = $_POST['t_price'];
 $info = $_POST['add_info'];
 print_r($_POST);
$insert = "INSERT INTO `bookings`(`c_name`, `mobno`, `email`, `address`, `ev_date`, `end_ev_date`, `ev_type`,`price`, `add_info`) VALUES ('$name','$mb','$em','$add','$evd','$nevd','$evt','$price','$info')";
  $exc = mysqli_query($cn, $insert);
  if($exc){
    echo "inserted";
  }
}
?>
