<?php
session_start();
if (isset($_POST['logout'])) {
    session_destroy();
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<center>
        <h1>
            <?php
            if (isset($_SESSION['email'])) {
                echo "Welcome " . $_SESSION['email'];

                ?>
            </h1>
            <br><br>

            <form action="" method="POST">
                <input type="submit" name="logout" value="logout">
            </form>

            <?php
            } else {
                header("location:index.php");
            }
            ?>
    </center>


    
</body>

</html>