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
        <title>Admin - Add New Products</title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <script src="bootstrap.js"></script> <!-- bootstrap.js is a JavaScript file, not a stylesheet -->
    </head>

    <body class="admin-body">

        <!--navbar-->
        <?php include "adminNavBar.php" ?>
        <!--navbar-->

        <div class="container-fluid mt-5 ">
            <div class="row">

                <div class="col-5 offset-3 mb-5">

                    <h2 class="text-center ">Add New Product</h2>

                    <div class="mb-3">
                        <label for="form-lable">Product Name</label>
                        <input type="text" class="form-control" id="pname">
                    </div>

                    <div class="mb-3 col-12">
                        <label class="form-label">Category</label>
                        <select class="form-control" id="cat">
                            <option value="0">Select Your Category</option>
                            <?php
                            $rs =  Database::search("SELECT * FROM `category`");
                            $num = $rs->num_rows;

                            for ($x = 0; $x < $num; $x++) {
                                $data = $rs->fetch_assoc();

                            ?>
                                <option value="<?php echo ($data["cat_id"]); ?>"><?php echo ($data["category_name"]); ?></option>
                            <?php
                            }

                            ?>

                        </select>
                    </div>

                    <div class="mb-3 col-12">
                        <label class="form-label">Sub Category</label>
                        <select class="form-control" id="sub_cat">
                            <option value="0">Select Your Sub Category</option>
                            <?php
                            $rs =  Database::search("SELECT * FROM `sub_category`");
                            $num = $rs->num_rows;

                            for ($x = 0; $x < $num; $x++) {
                                $data = $rs->fetch_assoc();

                            ?>
                                <option value="<?php echo ($data["sub_cat_id"]); ?>"><?php echo ($data["sub_category_name"]); ?></option>
                            <?php
                            }

                            ?>

                        </select>
                    </div>

                    <div class="mb-3 col-12">
                        <label class="form-label">Size</label>
                        <select class="form-control" id="size">
                            <option value="0">Select Your Size</option>
                            <?php
                            $rs =  Database::search("SELECT * FROM `size`");
                            $num = $rs->num_rows;

                            for ($x = 0; $x < $num; $x++) {
                                $data = $rs->fetch_assoc();

                            ?>
                                <option value="<?php echo ($data["size_id"]); ?>"><?php echo ($data["size"]); ?></option>
                            <?php
                            }

                            ?>

                        </select>
                    </div>



                    <div class="mb-3">
                        <label for="" class="form-lable">Description</label>
                        <textarea type="text" class="form-control" rows="5" id="desc"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="">Product Image</label>
                        <input id="file" class="form-control" type="file" multiple>
                    </div>

                    <div class="d-grid">
                        <button class="btn btn btn-secondary mb-2" onclick="registerProduct();">Add</button>
                    </div>
                </div>

            </div>
        </div>


       

        <script src="script.js"></script>
    </body>

    </html>

<?php
} else {
    echo ("You're not an admin");
}
?>