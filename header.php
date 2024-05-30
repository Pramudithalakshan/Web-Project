<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="bootstrap.css" />


</head>

<body onload="loadProduct(0);">

    <?php

    include "connection.php";

    ?>

    <div class="  container-fluid bg-info ">


        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img class="me-3" src="resource/img/icon1.ico" height="40" />Fruit Vista</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Cart</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">Sell</a>
                        </li>

                        <li class="nav-item me-5">
                            <a class="nav-link" href="adminSignin.php">Admin</a>
                        </li>

                        <!--category dropdown-->
                        <div class="me-5">

                            <div class="input-group">


                                <select class="form-select bg-info" style="max-width: 250px;">
                                    <option value="0">All Categories</option>

                                    <?php

                                    $cat_rs = Database::search("SELECT * FROM `category`");
                                    $cat_num = $cat_rs->num_rows;

                                    for ($x = 0; $x < $cat_num; $x++) {
                                        $homecategory_data = $cat_rs->fetch_assoc();

                                    ?>

                                        <option value="<?php echo $homecategory_data["cat_id"]; ?>">
                                            <?php echo $homecategory_data["category_name"]; ?>
                                        </option>

                                    <?php
                                    }

                                    ?>

                                </select>

                            </div>

                        </div>

                        <!--category dropdown-->

                        <form class="d-flex me-5 " role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="productsearch" onkeyup="Basicsearch(0);">
                            <button class="btn btn-outline-success" type="submit" >Search</button>
                        </form>
                        
                        <button class="btn btn-outline-danger" type="submit">Advance Search</button>


                    </ul>
                </div>
            </div>
        </nav>

    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>