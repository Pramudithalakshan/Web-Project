<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

if (empty($_FILES["i"])) {
    echo ("empty");
} else {
   
    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $user["email"] . "'");
    $d = $rs->fetch_assoc();

    if (!empty($d["p_img_path"])) {
        unlink($d["p_img_path"]); 
    }

    $path = "Resource/ProfileImg//" . uniqid() . ".png";
    move_uploaded_file($_FILES["i"]["tmp_name"], $path);

    Database::iud("UPDATE `user` SET `p_img_path` = '" . $path . "' WHERE `email` = '" . $user["email"] . "'");
    echo ($path);
 
}
