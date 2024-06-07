<?php

session_start();
include "connection.php";
$user = $_SESSION["u"];
$orderHistoryId = $_GET["orderId"];

$rs = Database::search("SELECT * FROM `order_history` WHERE `order_h_id`='" . $orderHistoryId . "'");
$num = $rs->num_rows;

if ($num > 0) {
    $d = $rs->fetch_assoc();
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="style.css">
        <title>FruitVista - Invoice</title>
    </head>

    <body >

        <div class="container text-end mt-2">
            <a href="index.php"><button class="btn ">Home</button></a>
        </div>

        <div class="container mt-2 mb-4 bg-body-secondary" id="printarea">
            <div class=" p-5 rounded-3">
                <div class="row">
                    <div class="col-6">
                        <h3>Order ID #<?php echo $d["order_id"] ?></h3>
                        <?php echo $d["order_date"] ?></h5>
                    </div>
                    <div class="col-6 text-end">
                        <h1>I N V O I C E</h1>
                        <h4>FruitVista</h4>
                        <h5> 161/1, Thalgahavila, </h5>
                        <h5>Horana.</h5>
                    </div>
                </div>

                <div>
                    <h4><?php echo $user["fname"] ?> <?php echo $user["lname"] ?></h4>
                    <h5><?php echo $user["mobile"] ?></h5>

                    <h5><?php echo $user["add_line1"] ?></h5>
                    <h5><?php echo $user["add_line2"] ?></h5>
                </div>

                <div class="ps-5 pe-5 mt-5">
                    <table class="table table-hover border border-1 border-black">
                        <thead>
                            <tr>
                                <th scope="row">Product Name</th>

                                <th scope="row">Category</th>

                                <th scope="row">Size</th>
                                <th scope="row">Qty</th>
                                <th scope="row">Price</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $rs2 = Database::search("SELECT * FROM order_item INNER JOIN stock ON 
                        order_item.stock_stock_id = stock.stock_id INNER JOIN
                        product ON stock.product_id=product.id INNER JOIN 
                        category ON product.category_cat_id=category.cat_id INNER JOIN
                        size ON product.size_size_id=size.size_id WHERE order_item.order_history_order_h_id = '" . $orderHistoryId . "'");

                            $num2 = $rs2->num_rows;

                            for ($i = 0; $i < $num2; $i++) {
                                $d2 = $rs2->fetch_assoc();

                            ?>
                                <tr>
                                    <td><?php echo $d2["name"]; ?></td>
                                    <td><?php echo $d2["category_name"]; ?></td>
                                    <td><?php echo $d2["size"]; ?></td>
                                    <td><?php echo $d2["order_item_qty"]; ?></td>
                                    <td>Rs. <?php echo ($d2["price"] * $d2["order_item_qty"]); ?></td>
                                </tr>
                            <?php
                            }

                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="text-center mt-5 pe-5">
                    <h6>Number of Items: <span class="text-muted"><?php echo $num2; ?></span></h6>
                    <h5>delivary Fee: <span class="text-muted">219</span></h5>
                    <h3>Net Total: <span class="text-muted"><?php echo $d["amount"]; ?></span></h3>
                </div>
            </div>
            
        </div>
        <div class="container mt-3 d-flex justify-content-end">
            <button class="btn btn-outline-dark col-2" onclick="window.printDiv()">Print</button>
        </div>

        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>


<?php
} else {
      header('location: home.php');
}


?>