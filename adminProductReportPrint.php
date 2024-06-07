<?php
session_start();
include "connection.php";

if (isset($_SESSION["a"])) {

    $rs = Database::search("SELECT * FROM `product` 
    INNER JOIN `category` ON `product`.`category_cat_id`=`category`.`cat_id` 
    INNER JOIN `size` ON `product`.`size_size_id`=`size`.`size_id` ORDER BY `product`.`id` ASC");

    $num = $rs->num_rows;
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="icon" href="resource/img/icon1.svg"/>
        <title>Product Report</title>
    </head>

    <body>

        <div class="container mt-3">
            <a href="adminReport.php"><img src="Resources/back.png" height="25"></a>
        </div>

        <div id="printarea">
            <div class="container mt-3">
                <h2 class="text-center ">Product Report</h2>
                <table class="table table-hover mt-5">

                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>


                            <th>Category</th>

                            <th>Description</th>
                            <th>Image</th>

                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs->fetch_assoc();
                        ?>
                            <tr>
                                <td><?php echo $d["id"] ?></td>
                                <td><?php echo $d["name"] ?></td>
                                <td><?php echo $d["category_name"] ?></td>
                                <td><?php echo $d["description"] ?></td>
                                <td><img src="<?php echo $d["path"] ?>" height="100" /></td>
                            </tr>

                        <?php
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container mt-3 d-flex justify-content-end">

            <button class="btn btn-outline-dark col-2" onclick="window.printDiv()">Print</button>
        </div>

        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </body>

    </html>

<?php
} else {
    echo ("You are not a valid admin");
}

?>