<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FruitVista</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="bootstrap.js" />

</head>

<body onload="loadProduct(0);">

    <?php

    include "header.php";

    ?>
    <div class="container-fluid offset-lg-0 offset-2">
        <div class="row">

            <div class="col-8 col-lg-5">
                <div class="product-card">
                    <img src="https://via.placeholder.com/350" alt="img">
                    <div class="product-card-body">
                        <h2>Product Name</h2>
                        <p>Price : 250.00</p>
                        <form>
                            <button class="btn btn-primary">Buy Now</button>
                            <button class="btn btn-warning">Add To Cart</button>
                        </form>
                    </div>
                </div>
            </div>

            

            <div class="d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>





        </div>
    </div>


    <script src="script.js"></script>
</body>

</html>