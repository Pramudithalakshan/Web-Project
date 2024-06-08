<?php
include "connection.php";

$pname = $_POST["pn"];
$cat = $_POST["c"];
$size = $_POST["s"];
$des = $_POST["d"];



if (empty($pname)) {
    echo ("Please Enter Product Name");
} else if (empty($cat)) {
    echo ("Please Enter Category Name");
} else if (empty($size)) {
    echo ("Please Enter Size Name");
} else if (empty($des)) {
    echo ("Please Enter Description");
} else {
    if (isset($_FILES["image"])) {
        $img = $_FILES["image"];
        $path = "resource/Productimg/" . uniqid() . ".png";
        move_uploaded_file($img["tmp_name"], $path);

        $rs = Database::search("SELECT * FROM `product` WHERE `name`='" . $pname . "'");
        $num = $rs->num_rows;

        if ($num > 0) {
            echo "Product Already Exist";
        } else {


            Database::iud("INSERT INTO `product`(`name`,`description`,`path`,`category_cat_id`,`size_size_id`) 
    VALUES('$pname','$des','$path','$cat','$size')");


            echo "success";
        }
    } else {
        echo ("Please select img");
    }
}
