<?php
include "connection.php";

$pageno = 0;
$page = $_POST["p"];

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` ORDER BY `stock`.stock_id ASC";
$rs = Database::search($q);
$num = $rs->num_rows;

$results_per_page = 8;
$num_of_page = ceil($num / $results_per_page);

$page_results = ($pageno - 1) * $results_per_page;

$q2 = $q . " LIMIT $results_per_page OFFSET $page_results";
$rs2 = Database::search($q2);
$num2  = $rs2->num_rows;

if ($num2 == 0) {
    echo ("Not avaliable Stock");
} else {

    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();
?>
        <!-- card -->
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>

            <link rel="stylesheet" href="style.css"/>
        </head>

        <body>

        <!--card-->
            <div class="col-3 mt-5 d-flex justify-content-center col-8 offset-2 offset-lg-0 col-lg-3 fs-4 ">

                <div class="card text-fw-bolder" style="width: 300px;">

                    <a href="sigleProductView.php?s=<?php echo $d["stock_id"]; ?>">
                        <img src="<?php echo $d["path"]; ?>" class="card-img-top w-100" alt="...">
                    </a>

                    <div class="card-body text-sm-center">
                        <h5 class="card-title"><?php echo $d["name"] ?></h5>
                        <p class="card-text"><?php echo $d["description"] ?></p>
                        <p class="card-text text-primary">Rs: <?php echo $d["price"] ?></p>
            
                    </div>
                </div>

            </div>
            <!--card-->

            <script src="script.js"></script>
        </body>

        </html>




        <!-- card -->


    <?php
    }



    ?>


    <!-- pagination -->
    <div class="d-flex justify-content-center mt-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" <?php

                                                            if ($pageno <= 1) {
                                                                echo ("#");
                                                            } else {
                                                            ?> onclick="loadProduct( <?php echo ($pageno - 1) ?>);" <?php
                                                                                                                }

                                                                                                                    ?>>Previous</a></li>
                <?php

                for ($y = 1; $y <= $num_of_page; $y++) {

                    if ($y == $pageno) {

                ?>
                        <li class="page-item active">
                            <a class="page-link" onclick="loadProduct(<?php echo  $y ?> );"><?php echo $y ?></a>
                        </li>

                    <?php

                    } else {

                    ?>
                        <li class="page-item ">
                            <a class="page-link" onclick="loadProduct(<?php echo  $y ?> );"><?php echo $y ?></a>
                        </li>

                <?php

                    }
                }

                ?>


                <li class="page-item"><a class="page-link" <?php

                                                            if ($pageno >= $num_of_page) {
                                                                echo ("#");
                                                            } else {
                                                            ?> onclick="loadProduct( <?php echo ($pageno + 1) ?>);" <?php
                                                                                                                }

                                                                                                                    ?>>Next</a></li>
            </ul>
        </nav>
    </div>

    <!-- pagination -->

<?php

}


?>