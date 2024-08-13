<?php 

    $hname = "localhost";
    $uname = "root";
    $pass = "";
    $db = "project";

    $cn = mysqli_connect($hname,$uname,$pass,$db);

    if(!$cn)
    {
        echo "CONNECTION ERROR";
        die();
    }
?>