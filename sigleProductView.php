<?php
include "connection.php";

$stock_id = $_GET["s"];
if (isset($stock_id)) {

    $q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` INNER JOIN  `category` ON
`product`.`category_cat_id` = `category`.`cat_id` INNER JOIN `size` ON `product`.`size_size_id` = `size`.`size_id` WHERE
`stock`.`stock_id`='" . $stock_id . "'";

    $rs = Database::search($q);
    $pdata = $rs->fetch_assoc();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="icon" href="resource/img/icon1.svg"/>
        <title>FruitVista</title>
    </head>

    <body>
        <!-- navbar -->
        <?php include "header.php" ?>
        <!-- navbar -->

        <div class="adminBody">
            <div class="col-8 row shadow-lg p-5 bg-body-tertiary rounded-2 m-auto">

                <div class="col-6">
                    <img src="<?php echo $pdata["path"]; ?>" class="rounded-3 shadow-lg" width="320px" />
                </div>
                <div class="col-6">
                    <h2><?php echo $pdata["name"]; ?></h2>

                    <h6><?php echo $pdata["category_name"]; ?></h6>

                    <h6><?php echo $pdata["size"]; ?></h6>
                    <p><?php echo $pdata["description"]; ?></p>
                    <div class="row">
                        <div class="col-2">
                            <input type="text" placeholder="Qty" class="form-control" id="qty" />
                        </div>
                        <div class="col-6 mt-2">
                            <h6 class="text-warning">Available Quantity : <?php echo $pdata["qty"]; ?></h6>
                        </div>
                    </div>
                    <h5 class="mt-3">Price : <?php echo $pdata["price"]; ?> .00</h5>
                    <div class="d-flex justify-content-center mt-3">


                        <button class="btn btn-outline-primary col-6 ms-2" onclick="addtoCart('<?php echo $pdata['stock_id'] ?>');">Add to cart</button>

                         
                            <button class="btn btn-outline-warning col-6 ms-2" onclick="buynow('<?php echo $pdata['stock_id'] ?>');">Buy Now</button>
                        
                    </div>
                </div>

            </div>

        </div>

        <!--footer -->
        <?php include  "footer.php" ?>

        <!--footer -->

        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </body>

    </html>
<?php
} else {
    header("location: index.php");
}


?>