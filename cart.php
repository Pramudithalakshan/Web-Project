<?php
include "connection.php";
session_start();


$user = $_SESSION["u"];

if (isset($user)) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <title>FruitVista - Cart</title>
        <link rel="icon" href="resource/img/icon1.svg"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    </head>

    <body onload="loadCart();">

        <!-- Navbar -->
        <?php include "header.php"; ?>
        <!-- Navbar -->

        <div class="container mt-5 mb-5">
       
            <div class="row" id="cartBody">




            </div>

        </div>
        <?php include "footer.php"; ?>

        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    </body>

    </html>

<?php

} else {
    header("location: signin.php");
}


?>