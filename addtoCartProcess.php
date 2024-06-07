<?php

include "connection.php";
session_start();

$user = $_SESSION["u"];
$stockId = $_POST["sid"];
$qty = $_POST["qty"];


$rs = Database::search("SELECT * FROM `stock` WHERE `stock_id`='" . $stockId . "'");
$num = $rs->num_rows;

if ($num > 0) {
    # code...
    $data = $rs->fetch_assoc();
    $stockQty = $data["qty"];

    $rs2 = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $user["email"] . "' AND `stock_stock_id`='" . $stockId . "'");
    $num2 = $rs2->num_rows;

    if ($num2 > 0) {
        //Update
        $data2 = $rs2->fetch_assoc();
        $newQty = $qty + $data2["cart_qty"];

        if ($stockQty >= $newQty) {
            # Update Query
            Database::iud("UPDATE `cart` SET `cart_qty`='" . $newQty . "' WHERE `cart_id`='" . $data2["cart_id"] . "'");
            echo "Cart item updated Successfully";
        } else {
            echo "Stock quantity has been exeeded!";
        }
    } else {

        if ($stockQty >= $qty) {
            //insert
            Database::iud("INSERT INTO `cart`(`cart_qty`,`user_email`,`stock_stock_id`) VALUES
            ('" . $qty . "','" . $user["email"] . "','" . $stockId . "')");
            echo "Item Added to the cart suucessfully";
        } else {
            echo "Stock quantity has been exeeded!";
        }
    }
} else {
    echo "Your stock not Found";
}
