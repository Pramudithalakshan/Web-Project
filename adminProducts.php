
<?php

session_start();

if (isset($_SESSION["a"])) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.css" />
        <title>online store</title>
    </head>

    <body class="admin-body">
        <!-- nav bar -->
        <?php include "adminNavBar.php" ?>
        <!-- nav bar -->

        <div class="col-10">
            <h2 class="text-center">Product Management</h2>

            <div class="row">
                <!-- Brand register -->
                <div class="col-4 mt-4 offset-1">
                    <label for="form-control">Brand Name</label>
                    <input type="text" class="form-control mb-3" id="brand"  />

                    <div class="d-none" id="msgDiv1" onclick="reload();">
                        <div class="alert alert-danger" id="msg1"></div>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-outline-warning col-12" onclick="brandReg();">Brand Register</button>
                    </div>

                </div>
                <!-- Brand register -->

                <!-- Catogary register -->
                <div class="col-4 mt-4 offset-2">
                    <label for="form-control">Category Name</label>
                    <input type="text" class="form-control mb-3" id="category"/>

                    <div class="d-none" id="msgDiv2" onclick="reload();">
                        <div class="alert alert-danger" id="msg2"></div>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-outline-warning col-12" onclick="categoryReg();">Category Register</button>
                    </div>

                </div>
                <!-- Catogary register -->
            </div>

            <div class="row mt-5">
                <!-- color register -->
                <div class="col-4 mt-4 offset-1">
                    <label for="form-control">Color</label>
                    <input type="text" class="form-control mb-3" id="color"/>

                    <div class="d-none" id="msgDiv3" onclick="reload();">
                        <div class="alert alert-danger" id="msg3"></div>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-outline-warning col-12" onclick="colorReg();">Color Register</button>
                    </div>

                </div>
                <!-- color register -->

                <!-- size register -->
                <div class="col-4 mt-4 offset-2">
                    <label for="form-control">Size</label>
                    <input type="text" class="form-control mb-3" id="size"/>

                    <div class="d-none" id="msgDiv4" onclick="reload();">
                        <div class="alert alert-danger" id="msg4"></div>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-outline-warning col-12" onclick="sizeReg();">Size Register</button>
                    </div>

                </div>
                <!-- size register -->
            </div>

            

        </div>

        <script src="script.js"></script>

    </body>

    </html>

<?php

} else {
    header("Location: adminSignIn.php");
}

?>
