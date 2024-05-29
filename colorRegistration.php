<?php

include "connection.php";

$color = $_POST["c"];
// echo($color);

if (empty($color)) {
    echo ("Please Enter Your Color");
} else if (strlen($color) > 20) {
    echo ("Your Color Should be less than 20 Characters");
} else {
    $rs = Database::search("SELECT * FROM `color name` = '" . $color . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("Your Color is Already Exists");
    } else {
        Database::iud("INSERT INTO `color` (`color name`) VALUES ('" . $color . "')");
        echo ("Success");
    }
}
