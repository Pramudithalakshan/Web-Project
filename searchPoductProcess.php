<?php
include "connection.php";

$pageno = 0;
$page = $_POST["p"];
$product = $_POST["ps"];

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id` WHERE `product`.`name` LIKE '%$product%'";
$rs = Database::search($q);
$num = $rs->num_rows;

$results_per_page = 8;
$num_of_page = ceil($num / $results_per_page);

$page_results = ($pageno - 1) * $results_per_page;

$q2 = $q . " LIMIT $results_per_page OFFSET $page_results";
$rs2 = Database::search($q2);
$num2  = $rs2->num_rows;

if ($num2 == 0) {
    //echo ("Not avaliable Stock");

    ?>
     <div class="d-flex flex-column justify-content-center text-center mt-5">
        <h5>Search No Result</h5>
        <p>We're Sorry, We cannot find any matches for your search term..</p>
    </div>
    
    <?php


} else {

    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();
?>
        <!-- card -->
        <div class=" col-3 mt-5 d-flex justify-content-center col-8 offset-2 offset-lg-0 col-lg-3">

            <div class="card" style="width: 300px;">
                <img src="<?php echo $d["path"] ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $d["name"] ?></h5>
                    <p class="card-text"><?php echo $d["description"] ?></p>
                    <p class="card-text">Rs: <?php echo $d["price"] ?></p>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-outline-primary col-6">Add To Cart</button>
                        <button class="btn btn-outline-warning col-6 ms-2">Buy Now</button>
                    </div>

                </div>
            </div>

        </div>
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
                                                            ?> onclick="Basicsearch( <?php echo ($pageno - 1) ?>);" <?php
                                                                                                                    }

                                                                                                                        ?>>Previous</a></li>
                <?php

                for ($y = 1; $y <= $num_of_page; $y++) {

                    if ($y == $pageno) {

                ?>
                        <li class="page-item active">
                            <a class="page-link" onclick="Basicsearch(<?php echo  $y ?> );"><?php echo $y ?></a>
                        </li>

                    <?php

                    } else {

                    ?>
                        <li class="page-item ">
                            <a class="page-link" onclick="Basicsearch(<?php echo  $y ?> );"><?php echo $y ?></a>
                        </li>

                <?php

                    }
                }

                ?>


                <li class="page-item"><a class="page-link" <?php

                                                            if ($pageno >= $num_of_page) {
                                                                echo ("#");
                                                            } else {
                                                            ?> onclick="Basicsearch( <?php echo ($pageno + 1) ?>);" <?php
                                                                                                                    }

                                                                                                                        ?>>Next</a></li>
            </ul>
        </nav>
    </div>

    <!-- pagination -->

<?php

}


?>