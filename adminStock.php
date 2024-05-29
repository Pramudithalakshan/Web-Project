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

    </head>

    <body class="admin-body">

        <?php

        include "adminNavBar.php";
        ?>


        <div class="container-fluid" style="margin-top: 80px;">

            <div class="row">

                <div class="col-5 offset-3">

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
            </div>
        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="script.js"></script>
    </body>

    </html>



<?php


} else {

    echo ("Your not an admin");
}
?>