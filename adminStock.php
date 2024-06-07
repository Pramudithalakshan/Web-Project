<?php
session_start();
include "connection.php";

if (isset($_SESSION["a"])) {
?>





    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stock - Management</title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="icon" href="resource/img/icon1.svg"/>

    </head>

    <body class="admin-body">

        <?php

        include "adminNavBar.php";
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-5 offset-1">
                    <h2 class="tetx-center">Stock Update</h2>

                    <select class="form-select" id="selectproduct">
                        <option value="0">Select Product</option>

                        <?php
                        $rs =  Database::search("SELECT * FROM `product`");
                        $num = $rs->num_rows;

                        for ($x = 0; $x < $num; $x++) {
                            $data = $rs->fetch_assoc();

                        ?>
                            <option value="<?php echo ($data["id"]); ?>"><?php echo ($data["name"]); ?></option>
                        <?php
                        }

                        ?>

                    </select>

                    <div class="mb-3">
                        <label for="" class="form-label">Qty</label>
                        <input type="text" class="form-control" id="stockqty" required>
                    </div>


                    <div class="mb-3">
                        <label for="" class="form-label">Unit Price</label>
                        <input type="text" class="form-control" id="unitprice" required>
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-secondary" onclick="updateStock();">Update Stock</button>
                    </div>
 

                </div>





                <div class="col-5 ">
                    <!-- Catogary register -->

                    <div class="mb-3">

                        <h2 class="text-center">Product Management</h2>

                        <label for="form-control">Category Name</label>
                        <input type="text" class="form-control mb-3" id="addnewcategory" />

                        

                        <div class="mt-3">
                            <button class="btn  btn-secondary col-12" onclick="categoryregister();">Category Register</button>
                        </div>

                        <div class="d-none" id="msgDiv2" onclick="reload();">
                            <div class="alert alert-danger" id="msg2"></div>
                        </div>
                        
                    </div>

                    <!-- Catogary register -->




                    <!-- size register -->
                    <div class="mt-3">
                        <label for="form-control">Size</label>
                        <input type="text" class="form-control mb-3" id="addnewsize" />

                        <div class="d-none" id="msgDiv4" onclick="reload();">
                            <div class="alert alert-danger" id="msg4"></div>
                        </div>

                        <div>
                            <button class="btn  btn-secondary col-12" onclick="sizeregister();">Size Register</button>
                        </div>
                    </div>
                </div>

                <!-- size register -->
            </div>
        </div>


        <!--Footer-->
        <div class="fixed-bottom col-12">
            <p class="text-center">&copy; 2024 FruitVista</p>
        </div>
        <!--Footer-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="script.js"></script>
    </body>

    </html>



<?php


} else {

    echo ("Your not an admin");
}
?>