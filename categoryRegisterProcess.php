<?php 

include "connection.php";


$addcategory = $_POST["b"];
// echo($brand);

if (empty($addcategory)){
    echo ("Please Enter Your Category Name");
} else if (strlen($addcategory) > 20){
    echo ("Your Category Name Should Be Less Than 20 Characters");
} else {

    $rs = Database::search("SELECT * FROM `category` WHERE `category_name` = '" . $addcategory . "'");
    $num = $rs->num_rows;
    
    if ($num > 0) {
        echo ("Your Category Name is Already Exist");
    } else {
        Database::iud("INSERT INTO `category` (`category_name`) VALUES ('" . $addcategory. "')");
        echo ("Success");
    }

}


?>