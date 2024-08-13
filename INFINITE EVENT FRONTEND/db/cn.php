<?php 

    $hname = "localhost";
    $uname = "root";
    $pass = "";
    $db = "infinite_event";

    $cn = mysqli_connect($hname,$uname,$pass,$db);

    if(!$cn)
    {
        echo "CONNECTION ERROR";
        die();
    }
?>