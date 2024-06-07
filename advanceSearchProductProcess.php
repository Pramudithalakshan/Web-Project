<?php

include "connection.php";

$pageno = 0;
$page = $_POST["pg"];
$cat = $_POST["cat"];
$size = $_POST["s"];
$minPrice = $_POST["min"];
$maxPrice = $_POST["max"];

// echo($color);

$status = 0;

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}


$q = "SELECT * 
FROM `stock` 
INNER JOIN `product` ON `stock`.`product_id` = `product`.`id`
INNER JOIN `category` ON `product`.`category_cat_id` = `category`.`cat_id`
INNER JOIN `size` ON `product`.`size_size_id` = `size`.`size_id` ";



// Search by category 

if ($status == 0 && $cat != 0) {
    //1st time search by category (Where)
    $q .= "WHERE `category`.`cat_id` = '" . $cat . "' ";
    $status = 1;
    //2st time search by category (And)
} elseif ($status != 0 && $cat  != 0) {
    $q .= "AND `category`.`cat_id` = '" . $cat . "' ";
}



//search by size
if ($status == 0 && $size != 0) {
    //1st time search by size (Where)
    $q .= "WHERE `size`.`size_id` = '" . $size . "' ";
    $status = 1;
    //2st time search by size (And)
} elseif ($status != 0 && $size  != 0) {
    $q .= "AND `size`.`size_id` = '" . $size . "' ";
}

//search by min price
if (!empty($minPrice) && empty($maxPrice)) {
    if ($status == 0) {
        $q .= "WHERE `stock`.`price`>= '" . $minPrice . "' ORDER BY `stock`.`price` ASC ";
        $status = 1;
    } else if ($status != 0) {
        $q .= "AND `stock`.`price`>= '" . $minPrice . "' ORDER BY `stock`.`price` ASC ";
    }
}

//SEARCH BY MAX PRICE

if (!empty($maxPrice) && empty($minPrice)) {
    if ($status == 0) {
        $q .= "WHERE `stock`.`price`<= '" . $maxPrice . "' ORDER BY `stock`.`price` ASC ";
        $status = 1;
    } else if ($status != 0) {
        $q .= "AND `stock`.`price`<= '" . $maxPrice . "' ORDER BY `stock`.`price` ASC ";
    }
}

//SEARCH BY  PRICE range
if (!empty($minPrice) && !empty($maxPrice)) {
    if ($status == 0) {
        $q .= "WHERE `stock`.`price` BETWEEN '" . $minPrice . "' AND '" . $maxPrice . "' ORDER BY `stock`.`price` ASC ";
        $status = 1;
    } else if ($status != 0) {
        $q .= "AND `stock`.`price` BETWEEN '" . $minPrice . "' AND '" . $maxPrice . "' ORDER BY `stock`.`price` ASC ";
    }
}

$rs = Database::search($q);
$num = $rs->num_rows;

$results_per_page = 8;
$num_of_page = ceil($num / $results_per_page);
$page_results = ($pageno - 1) * $results_per_page;

$q2 = $q . " LIMIT $results_per_page OFFSET $page_results";

$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;

if ($num2 == 0) {
    # code...

?>
    <div class="d-flex flex-column justify-content-center mt-5 align-items-center">
        <h5>Search No Results</h5>
        <p>We're Sorry, We cannot find any matches for your search them..</p>

    </div>

    <?php
} else {
    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();
    ?>
        <!--card-->
        <div class="col-3 mt-5 d-flex justify-content-center col-8 offset-2 offset-lg-0 col-lg-3 ">

            <div class="card bg-info" style="width: 300px;">

                <a href="sigleProductView.php?s=<?php echo $d["stock_id"]; ?>">
                    <img src="<?php echo $d["path"]; ?>" class="card-img-top w-100" alt="...">
                </a>

                <div class="card-body text-sm-center">
                    <h5 class="card-title"><?php echo $d["name"] ?></h5>
                    <p class="card-text"><?php echo $d["description"] ?></p>
                    <p class="card-text">Rs: <?php echo $d["price"] ?></p>

                </div>
            </div>

        </div>

     


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
