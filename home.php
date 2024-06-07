<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FruitVista</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="bootstrap.js" />

    <link rel="icon" href="resource/img/icon1.svg"/>

</head>

<body onload="loadProduct(0);">

    <?php
    include "connection.php";
    include "header.php";


    ?>
    <!--carousel-->

    <div class="col-10 d-none d-lg-block mb-3 offset-1">
        <div class="row">

            <div id="carouselExampleIndicators" class="offset-2 col-8 carousel slide" data-bs-ride="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="resource/img/carousel1.jpg" class="d-block img-thumbnail poster-img-1" />
                        <div class="carousel-caption d-none d-md-block poster-caption">
                            <h5 class="poster-title">Welcome to eShop</h5>
                            <p class="poster-txt">The World's Best Online Store By One Click.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="resource/img/carousel2.jpg" class="d-block img-thumbnail poster-img-1" />
                    </div>
                    <div class="carousel-item">
                        <img src="resource/img/carousel3.jpg" class="d-block img-thumbnail poster-img-1" />
                        <div class="carousel-caption d-none d-md-block poster-caption-1">
                            <h5 class="poster-title">Be Free.....</h5>
                            <p class="poster-txt">Experience the Lowest Delivery Costs With Us.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
    </div>

    <!--carousel-->
    <div class="row col-10 offset-1" style="cursor: pointer;" id="pid">


    </div>


    <?php

    include "footer.php";

    ?>

    <script src="script.js"></script>
</body>

</html>